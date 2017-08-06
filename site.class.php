<?php
/**
 *  this file contains the 'site' class declaration
 */

class site extends markup {
  
// parameters
  public $trouble = true;  

  private $page = null;

  public function __construct($t=false) {
    if($t) $this->trouble = true;
    parent::__construct();
    $this->getPage();
  }

/**
*   method to parse the url provided and populate the get array with the request parameters
*   the initial string stub within the url (after the domain) is returned as a php filename to be used
*   $t : boolean : error output switch
*/
  protected function getPage() {

    $this->ts(__function__,'func'); 
    $this->ts($_SERVER["REQUEST_URI"],'request_uri'); 
    #$this->ts($_SERVER,'SERVER'); }

    # GRAB REQUESTED URI AFTER DOMAIN VALUE
        $uv = explode('/', substr( $_SERVER["REQUEST_URI"] , 0, strpos( $_SERVER["REQUEST_URI"],'?')));

    $this->ts($uv,'UV'); 

    # CLEAR EMPTY VALUES WITHIN ARRAY
        foreach($uv AS $i=>$j) { if(empty($j) || strpos($j,'index.html') !== false) unset($uv[$i]); }

    # REJIG KEYS WITHIN ARRAY
        $uv = array_values($uv);

    $this->ts($uv,'UV');  

    # special setup for a 'single page' site:
    # set the default page as 'home'
    # set a special case if ajax is requested
    # all other url strings are assumed to be parameters, rather than page requests.

    # set the default page to go to
        $page = DEFAULT_PAGE;
    # special cases for specific handlers
        switch($uv[0]) {
    # ajax and iframe modal pages
        case'ajax':
        case'modal':
            $page = $uv[0];
            unset($uv[0]);
            $uv = array_values($uv);
        break;
    # default behaviour for any other supplied request
        default:
            if(!empty($uv[0])) {
                $page = $uv[0];
                unset($uv[0]);
                $uv = array_values($uv);
            }
        }

    # populate the GET array with alphanumeric range derived from the rest of the url string.
        $range = range('a','z');
        foreach($uv AS $i=>$u) {
            $_GET[ $range[ $i ] ] = $u;
        }

    $this->ts($_GET,'GET'); 

    $this->ts($page,'PAGE');

    # remove the 'a' key-value pair and reset the $_GET array
        $uv = array_values($_GET);

    $this->ts($_GET,'GET'); 

    if($this->trouble) { 
        echo $this->ts; 
    }
    # output the page filename to be used.
    try {
      $page = new $page();
    }
    catch(Exception $e) {
      $page = new err404();
    }
  }

  protected function ts($a,$t=null) {
    if($this->trouble) {
      parent::ts($a,$t);
    }
  }
}
