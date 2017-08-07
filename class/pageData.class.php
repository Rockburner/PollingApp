<?php
/**
 *  page data class to handle the data-layer of requests
 */

class pageData extends dbc {

  public function __construct() {
    parent::__construct();
  }

/**
 *  method to collect the candidates for the user's constituency
 *  
 *  NOTE: Since we have an unpopulated candidate table for this demonstration, this method will call the createCandidates method to create dummy data if none exists - obviously this is for DEMONSTRATION only.
 *
 *  @return [type] [description]
 */

  public function getCandidates() {
    if($this->error) { return; }

    $q = $this->query("
      SELECT 
        candidate.id AS id,
        CONCAT_WS(' ',
          candidate.name,
          'of',
          party.name) AS candidate
      FROM `candidate` 
      JOIN `party` ON candidate.party_id = party.id
      WHERE constituency_id = ".$this->user['constituency_id']."
      ORDER BY RAND()
    ",'id');

    if(!$q) {
      // create some dummies (hah!)
      $this->createCandidates();
    }
    else {
      $this->candidates = $q;
    }

  }

/**
 *  method to generate candidates for the set of parties pulled from the database
 *
 *  @return [type] [description]
 */

  public function createCandidates() {
    if($this->error) { return; }

    $this->getParties();

    // loop through the parties to create the values for insertion
    $vals = array();

    foreach($this->parties AS $i=>$p) {
      $vals[] = "(NULL,'Candidate ".$i."',".$this->user['constituency_id'].",".$p['id'].",'".$this->election['id']."')";
    }
    $q = "INSERT INTO `candidate` (`id`,`name`,`constituency_id`,`party_id`,`election_id`) VALUES ".implode(',',$vals);
    
    $this->query($q);

    if(!$q) {
      $this->error("Candidates failed to be created");
    }

    //rerun the candidate search method
    $this->getCandidates();

  }  

  public function getParties() {
    if($this->error) { return; }

    // get the list of parties
    $q = $this->query("
        SELECT * FROM `party` ORDER BY `name` ASC
      ");

    if(!$q) {
      $this->error("Parties couldn't be found.");
      return;
    }

    $this->parties = $q;

  }


/**
 *  method to get the constituency details that are relevant to the user
 *
 *  @return [type] [description]
 */

  public function getUserConstituency() {
    if($this->error) { return; }

    $q = $this->query("
      SELECT * from `constituency` 
      WHERE id = ".$this->user['constituency_id']."
    ");

    if(!$q) {
      $this->error("Constituency details not found, please choose a constituency in your profile page before you can vote");
      return;
    }
    $this->constituency = $q[0];
  }


  public function getConstituency( $id ) {
    if($this->error) { return; }

    $q = $this->query("SELECT * FROM constituency WHERE id = ".$id);

    if(!$q) {
      $this->error("Constituency can't be found");
    }

    $this->constituency = $q[0];

  }


/**
 *  method to get the next election, is one is coming up.
 *
 *  @return [type] [description]
 */

  public function getNextElection() {
    if($this->error) { return; }

    // get the election that is happening within the next 2 weeks.
    $q = $this->query("
      SELECT * 
      FROM `election` 
      WHERE date <= (CURDATE() + INTERVAL ".VOTING_WINDOW." WEEK) 
      AND date > CURDATE() 
      AND active = 1
      LIMIT 0,1
      ");

    if(!$q) {
      $this->error("There are no current elections for you to vote on.");
      return;
    }

    $this->election = $q[0];
  }  

/**
 *  method to get a particular election
 *
 *  @param  [type] $id [description]
 *
 *  @return [type]     [description]
 */

  public function getElection( $id ) {
    if($this->error) { return; }

    $q = $this->query("SELECT * FROM election WHERE id = ".$id);

    if(!$q) {
      $this->error("Election can't be found");
    }

    $this->election = $q[0];
  }

/**
 *  method to take the vote data posted and handle it
 *  Ideally we'd use transactions here to make sure no user-election records are stored if the votes are not stored if there are db storage errors 
 *
 *  @return [type] [description]
 */

  public function vote() {
    
    // get the data from the post
    $this->data = $this->dbSafe($_POST);
    
    // get the party id from the chosen candidate id
    $this->getCandidate($this->data['candidate_id']);

    // post the vote details into the vote table
    $q = $this->query("
      INSERT INTO `vote` (`id`,`candidate_id`,`constituency_id`,`party_id`,`election_id`)
      VALUES (
        NULL,
        ".$this->data['candidate_id'].",
        ".$this->user['constituency_id'].",
        ".$this->candidate['party_id'].",
        ".$this->data['election_id']."
      )
      ");

    if(!$q) {
      $this->error("Vote failed!");
      return;
    }
     
    // post the user details into the user_election record to keep a record of user voting seperately from the actual votes
    $q = $this->query("
      INSERT INTO `user_election` (`voting`,`election_id`,`user_id`)
      VALUES (".$this->data['voting'].",".$this->data['election_id'].",".$this->user['id'].")
      ");
    if(!$q) {
      $this->error("User Election record failed");
      return;
    }

    $this->votecounted = true;
    
  }


  protected function getCandidate($id) {
    if($this->error) { return; }

    $q = $this->query("
        SELECT * FROM `candidate` WHERE id = ".$id."
      ");

    if(!$q) {
      $this->error("Candidate couldn't be find");
      return;
    }

    $this->candidate = $q[0];
  }



/**
 *  method to get the user data from session and drop out if unsuccessful
 */

  public function setUser() {

    if(empty($_SESSION[SESS]['user'])) {
      $this->error = true;
      $this->output .= $this->tag('p',array('class'=>'error'), "User details not found, please attempt to login again.");
      $this->output .= $this->tag('a',array('href'=>'/'),"Return to login");
      return;
    }

    $this->getUser($_SESSION[SESS]['user']);

    if(is_array($this->user['voting_record'])) {
      foreach($this->user['voting_record'] AS $i=>$v) {
        $this->ts($v,'vote-record');
      // set a parameter to true if this user has already voted on the current election    
        if($v['election_id'] == $this->election['id']) {
          $this->user['voted_date'] = $v['voted_date'];
          $this->votecounted = true;
          break;
        }
      }
    }

    $this->ts($this->user,'blah');
    #exit( $this->ts );

  }

  private function getUser() {
    if($this->error) { return; }

    $q = $this->query("
      SELECT `user`.*,
      CONCAT(
        '[',
        GROUP_CONCAT(
          CONCAT(
            '{\"voted_date\":\"',
            user_election.date,
            '\",\"election_id\":\"',
            user_election.election_id,
            '\"}'
          )
          ORDER BY user_election.date ASC
          SEPARATOR ','
        ),
        ']'
      ) AS voting_record
      FROM `user` 
      LEFT JOIN `user_election` ON user.id = user_election.user_id
      WHERE user.id = ".$_SESSION[SESS]['user']."
      GROUP BY user.id
    ");

    if(!$q) {
      $this->error = 1;
      $this->output = "User details not found, please register before you can vote.";
      return;
    }

    $this->user = $q[0];
    $this->user['voting_record'] = json_decode($this->user['voting_record'],true);

  }

  public function nations() {
    if($this->error) { return; }
    $q =  "SELECT id, name FROM nation ORDER BY name ASC";
    
    if(!$q) {
      $this->error("Nations could not be found");
      return;
    }
    
    $this->nations = $this->query($q,'id');
  }

  protected function error($t=null) {
    $this->error = true;
    $this->output = $t;
    return;
  }
}
