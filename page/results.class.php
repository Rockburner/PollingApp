<?php
/**
 *  This is the class declaration for the 'results' page.
 *
 *  On this page there will be statistical breakdowns of the election results.
 *
 *  It should be possible to select older elections to look at
 *
 *  It should be possible to exmaine the results for each election by:
 *    Votes per party/candidate by constituency
 *    Overall votes per party nationwide
 */

class results extends page {

  public function __construct() {
    parent::__construct();
    $this->resultsData = new resultsData();
    $this->makePage();
  }


  protected function makePage(){
    $this->data = $this->resultsData->dbSafe($_GET);

    // if we have an election id in the GET then o
    if(isset($this->data['election'])) {
      $this->resultsData->getElection( $this->data['election'] );
    }
    // if no election or constituency parameters are passed by GET then find the current election
    else {
      $this->resultsData->getNextElection();
    }

    // get the consitituency details if passed
    if(isset($this->data['constituency'])) {
      $this->resultsData->getConstituency( $this->data['constituency'] );
    }
    // if we have a logged in user, default to their constituency
    elseif($this->resultsData->user) {
      $this->resultsData->getUserConstituency();
    }
    // if no one is logged in, do nothing.
    else {
    }

    $this->displayElection();
    $this->displayConstituency();
    $this->displayUsers();
    $this->displayWillingUsers();
    $this->displayVotes();


    $this->outputPage();
  }


  protected function displayElection() {
    $e = $this->resultsData->election;
    $this->body .= $this->tag('h2',null, $e['name'] );
    $this->body .= $this->tag('p',null, $e['description'] );
    $this->body .= $this->tag('p',null,
      'Election date: '.
      $this->tag('time',array('datetime'=>$e['date']), date('l, j F Y', strtotime($e['date'])) )
    );
  }

  protected function displayConstituency() {
    if(!$this->resultsData->constituency) { return; }
  }

/**
 *  method to generate markup for the current user count (either by constituency or nationally)
 *
 *  @return [type] [description]
 */

  protected function displayUsers() {
    if($this->resultsData->constituency) { 
      $c = $this->resultsData->constituencyUsers;
    }
    else {
      $c = $this->resultsData->allUsers;
    }

    $this->body .= $this->tag('h4',null,'Registered Users : '.$c);

  }

/**
 *  method to generate markup for the willing users count (either by constituency or nationally)
 *
 *  @return [type] [description]
 */

  protected function displayWillingUsers() {
    if($this->resultsData->constituency) { 
      $c = $this->resultsData->willingConstituents;
    }
    else {
      $c = $this->resultsData->willingUsers;
    }

    $this->body .= $this->tag('h4',null,'Registered Users expressing a willingness to vote: '.$c);
  }

/**
 *  method to generate the current voting records counts (either by constituency or nationally )
 *
 *  @return [type] [description]
 */

  protected function displayVotes() {
    if($this->resultsData->constituency) { 
    }
    else {
    }

  }


}
