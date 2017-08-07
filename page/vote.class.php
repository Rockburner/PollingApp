<?php
/**
 *  The vote page class
 */

class vote extends page {

  public function __construct() {
    parent::__construct();
    $this->makePage();
  }

  protected function makePage() {
    // get the election that is currently being decided
    $this->pageData->getNextElection();
    
    // collect the user data from session
    $this->pageData->setUser();

    if(isset($_POST['vote'])) {
      $this->pageData->vote();
    }

    // get the constituency details for later user
    $this->pageData->getUserConstituency();


    // get the candidates
    $this->pageData->getCandidates();

    if($this->pageData->error) {
      $this->body .= $this->pageData->output;
    }

    // create the page
    $this->outputPage();
  }

/**
 *  method to handle the generation of the voting form.
 *
 *  @return [type] [description]
 */

  protected function voteForm() {
    if($this->error) { return; }

    $vote = new form();

    $vote->action = '/vote';
    $vote->method = 'post';
    $vote->id = 'vote';

    $vote->legend ("Please select your choice of the Candidates for your Constituency of ".$this->pageData->constituency['name'].".");
    $vote->para("You will only be able to select 1 (one) candidate.");
    $vote->para("If you change your mind before clicking the select button, just click the new choice.");
    $vote->inputCheckbox('voting','Are you going to vote?');
    $vote->para("For security reasons, we do not store WHO you might vote for against your name, but we DO keep a record that you have made a choice.");
    $vote->inputRadio('candidate_id','Choose who you are likely to Vote for',null,null,$this->pageData->candidates);
    $vote->inputHidden('vote','vote');
    $vote->inputHidden('election_id',$this->pageData->election['id']);
    $vote->inputSubmit('submit','Vote now');
    $vote->fieldset();

    $this->body .= $vote->form();

  }

  protected function electionTitle() {
    $this->body .= $this->tag('h1',null,$this->pageData->election['name']);
    $this->body .= $this->tag('p',null,$this->pageData->election['description']);
  }

  protected function voted() {

    $this->body .= $this->tag('h4',null,"Thank you for voting.");
    
    if($this->pageData->user['voted_date']) {
      $votedDate = date('l, j F Y', strtotime($this->pageData->user['voted_date']) );
      $this->body .= $this->tag('p',null,"You voted on ". $votedDate);
    }
  }

  protected function outputPage() {
    
    $this->electionTitle();

    if($this->pageData->votecounted) {
      $this->voted();
    }
    else {
      $this->voteForm();
    }

    $this->logoutButton();
    parent::outputPage();
  }
}
