<?php
/**
 *  The page markup wrapping class
 */

class page extends markup {
  
  public $title = null;
  public $markup = null;
  public $header = null;
  public $comments = null;

  protected $body = null;
  protected $head = null;

  protected $page = 'default';
  protected $trouble = null;

  public function __construct() {
    parent::__construct();
  }

  protected function title($t=null) {
    if(!$t && $this->title) {
      $t = $this->title;
    }
    $this->head .= $this->t('title',null,$t);
  }

  protected function meta() {
    $a = array(
      array('http-equiv'=>"Content-Type",'content'=>"text/html; charset=UTF-8"),
      array('name'=>"author", 'content'=>"James Bridge-Butler, RBDev.uk"),
      array('name'=>"copyright", 'content'=>"Copyright (c) RBDev.UK"),
      array('name'=>"description",'content'=> "Demonstration of E-Voting App.")
    );
    foreach($a AS $at) {
      $this->head .= $this->t('meta',$at);
    }
  }

  protected function link() {
    $a = array(
      array('rel'=>"shortcut icon",'href'=>"/favicon.ico")
    );
    foreach($a AS $at) {
      $this->head .= $this->t('link',$at);
    }    
  }

  protected function headElement() {
    $this->title();
    $this->meta();
    $this->link();
    $this->markup .= $this->t('head',null, $this->head );
  }

  protected function bodyElement() {
    $this->markup .= $this->t('body',array('class'=>$this->page),$this->body);
  }

  protected function trouble() {
    $this->markup .= $this->t('div',array('class'=>'troubleshooting'), $this->ts );
  }

  protected function outputPage() {
    $this->trouble();

    $this->headElement();
    $this->bodyElement();

    echo $this->t('html',array(),
      $this->markup
    );

  }


}
