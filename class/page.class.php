<?php
/**
 *  The page markup wrapping class
 */

class page extends markup {

  public $title = null;
  public $markup = null;
  public $header = null;
  public $comments = null;

  public $page = null;

  public $metaData = array(
      array('http-equiv'=>"Content-Type",'content'=>"text/html; charset=UTF-8"),
      array('name'=>"author", 'content'=>"James Bridge-Butler, RBDev.uk"),
      array('name'=>"copyright", 'content'=>"Copyright (c) RBDev.UK"),
      array('name'=>"description",'content'=> "Demonstration of E-Voting App.")
    );
  public $linkTags = array(
      array('rel'=>"shortcut icon",'href'=>"/favicon.ico")
    );
  public $scripts = array();
  public $styles = array();

  protected $error = false; // used to break a page if something goes wrong 

  protected $body = null;
  protected $head = null;
  protected $pageclass = 'default';


  public function __construct() {
    $this->pageData = new pageData();
    parent::__construct();
  }

  protected function title($t=null) {
    if(!$t && $this->title) {
      $t = $this->title;
    }
    $this->head .= $this->tag('title',null,$t);
  }

  protected function meta() {
    foreach($this->metaData AS $at) {
      $this->head .= $this->tag('meta',$at);
    }
  }

  protected function link() {
    foreach($this->linkTags AS $at) {
      $this->head .= $this->tag('link',$at);
    }    
  }

  protected function headElement() {
    $this->title();
    $this->meta();
    $this->link();
    $this->markup .= $this->tag('head',null, $this->head );
  }

  protected function navigation() {
    $sitemap = array(
      array(
        'href'=>'home',
        'title'=>'Home'
      ),
      array(
        'href'=>'results',
        'title'=>'Results'
      )
    );
    if($this->pageData->user) {
      $sitemap[] = array('href'=>'profile','title'=>'User Profile');
    }
    $nav = $this->ul($sitemap,'navItem','nav');
    $this->markup .= $this->tag('nav',null,$nav);
  }

  protected function navItem($a) {
    return $this->tag('a',array('href'=>'/'.$a['href'],'title'=>$a['title']), $a['title']);
  }

  protected function bodyElement() {
    $this->markup .= $this->tag('body',array('class'=>$this->pageclass),$this->body);
  }

  protected function logoutButton() {
    if($this->pageData->user) {
      $this->body .= $this->tag('div',null,
        $this->tag('a',array('href'=>'/logout','title'=>'Logout'),'Logout')
      );
    }
  }

  protected function trouble() {
    $this->ts("[".$this->tsts()."]",'Page finished at : ');    
    $this->markup .= $this->tag('div',array('class'=>'troubleshooting'), 
      $this->ts 
    );
  }

  protected function outputPage() {

    $this->headElement();
    $this->navigation();
    $this->bodyElement();

    #$this->trouble();

    $this->page = $this->tag('html',array(),
      $this->markup
    );

  }
}
