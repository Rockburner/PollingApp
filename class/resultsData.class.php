<?php
/**
 *  Results data class here, extends the pageData class
 */

class resultsData extends pageData {

  public $constituency = null;
  public $election = null;

  public function __construct() {
    parent::__construct();
  }

  public function getData() {
    $this->getAllVotes();
    $this->getVotesByConstituency();
    $this->getUsersWillingToVote();
    $this->getUsersWillingToVoteByConstituency();
    $this->getAllUsers();
    $this->getUsersbyConstituency();
  }

/**
 *  method to query the database and get a count of all votes for the currently selected election
 *
 *  @return [type] [description]
 */

  public function getAllVotes () {
    $q = $this->query("
        SELECT 
        FROM `votes`
      ");
  }

/**
 *  method to get the votes for a particular constituency if that is available
 *
 *  @param  [type] $c [description]
 *
 *  @return [type]    [description]
 */

  public function getVotesByConstituency () {
    if(!$this->constituency) { return; }

  }

/**
 *  method to query the user_election and user tables to get the number of users willing to vote
 *
 *  @return [type] [description]
 */

  public function getUsersWillingToVote() {
    $s = "
      SELECT count(user.id) AS c
      FROM user_election
      JOIN user ON user_election.user_id
        AND user_election.election_id = ".$this->election['id']."
        AND user_election.voting = 1";
    $q = $this->query($s);

    $this->willingUsers = $q[0]['c'];
  }

  public function getUsersWillingToVoteByConstituency () {
    if(!$this->constituency) { return; }
    $s = "
      SELECT count(user.id) AS c
      FROM user_election
      JOIN user ON user_election.user_id
        AND user_election.election_id = ".$this->election['id']."
        AND user_election.voting = 1
      WHERE user.constituency_id = ".$this->constituency['id'];
    $q = $this->query($s);

    $this->willingConstituents = $q[0]['c'];

  }


/**
 *  method to fetch all the users within a particualar constituency
 *
 *  @return [type] [description]
 */

  public function getUsersbyConstituency() {
    if(!$this->constituency) { return; }

    $q = $this->query(" SELECT count(id) AS c FROM users WHERE confirmed = 1 AND constituency_id = ".$this->constituency['id']);

    $this->constituencyUsers = $q[0]['c'];
  }

/**
 *  method to fetch a count of all of the active (registered) users in the system
 *
 *  @return [type] [description]
 */

  public function getAllUsers() {
    $q = $this->query(" SELECT count(id) AS c FROM users WHERE confirmed = 1");

    $this->allUsers = $q[0]['c'];
  }


}
