<?php
/**
 *  this file contains the 'site' class declaration
 */

class site extends base {
  
// parameters
  public $trouble = false;  

  public function __construct($t=false) {
    if($t) { $this->trouble = true; }
    parent::__construct();
    $this->getPage();
  }

/**
 *  Simplified controller method
 *   method to parse the url provided and populate the get array with the request parameters
 *   the initial string stub within the url (after the domain) is returned as a php filename to be used
 */
  protected function getPage() {

    $this->ts(__function__,'func'); 
    $this->ts($_SERVER["REQUEST_URI"],'REQUEST_URI'); 
    #$this->ts($_SERVER,'SERVER'); 

    # GRAB REQUESTED URI AFTER DOMAIN VALUE
    $uri = $_SERVER["REQUEST_URI"];
    $this->ts($uri,'uri00'); 
    if(strpos($uri,'?')) {
      $uri =  substr( $uri, 0, strpos( $uri,'?') );
      $this->ts($uri,'uri0'); 
    }
    $uri = explode('/',$uri);
    $this->ts($uri,'uri1'); 

    # CLEAR EMPTY VALUES WITHIN ARRAY
        foreach($uri AS $i=>$j) { if(empty($j) || strpos($j,'index.html') !== false) unset($uri[$i]); }

    # REJIG KEYS WITHIN ARRAY
        $uri = array_values($uri);

    $this->ts($uri,'uri2');  

    # special setup for a 'single page' site:
    # set the default page as 'home'
    if(empty($uri[0])) { 
        $page = DEFAULT_PAGE;
    }
    # set a special case if ajax is requested
    # all other url strings are assumed to be parameters, rather than page requests.

    # special cases for specific handlers
        switch($uri[0]) {
    # ajax and iframe modal pages
        case'ajax':
        case'modal':
            $page = $uri[0];
            unset($uri[0]);
            $uri = array_values($uri);
        break;
    # default behaviour for any other supplied request
        default:
            if(!empty($uri[0])) {
                $page = $uri[0];
                unset($uri[0]);
                $uri = array_values($uri);
            }
        }

    # populate the GET array with alphanumeric range derived from the rest of the url string.
        $range = range('a','z');
        foreach($uri AS $i=>$u) {
            $_GET[ $range[ $i ] ] = $u;
        }

    $this->ts($_GET,'GET1'); 

    $this->ts($page,'PAGE');

    # remove the 'a' key-value pair and reset the $_GET array
        $uri = array_values($_GET);

    $this->ts($_GET,'GET2'); 

    if($this->trouble) { 
        echo $this->ts; 
    }
    # output the page filename to be used.
    if(class_exists($page)){
        $p = new $page();
    }
    # fallback if page class is not set
    else {
        $p = new err404();
    }
    $this->output = $p->page;
  }

  protected function ts($a,$t=null) {
    if($this->trouble) {
      parent::ts($a,$t);
    }
  }
}
