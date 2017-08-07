<?php
/**
 *  the candidates page class
 *
 *  this page will display further details of the election candidates, even if the election can't be voted on yet (ie, is not 2 weeks in the future)
 */


class candidates extends page {

  public function __construct() {
    parent::__construct();
    $this->makePage();
  }


  protected function makePage() {
    // get the current election
    // 
    // get the user's constituency
    // 
    // get the candidates for this election in this constituency
    // 
    // make the page output
  }
}
