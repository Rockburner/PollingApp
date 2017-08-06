<?php
/**
 *  the class declation for the database connection and operations
 */

class dbc {

// these would be better off declared in a config file
  public $db = 'kineotest';
  public $un ='kineotest';
  public $pw = 'kineotest';
  public $ho = 'localhost';


  private $dbc = null;

  public function __construct() {
    $this->connect();
  }

  protected function connect() {
    // connect to the database using the default values
    $this->dbc = mysqli_connect ( $ho, $un, $pw, $db );
    
    // set the charset
    mysqli_set_charset ( $dbobject , 'utf-8' );  
  }

  public function query($s) {
    $q = mysqli_query( $this->dbc, $s );
  // if we don't get a positive result, use ts
    if(!$q) { 
      ts(mysqli_error( $this->dbc ),'QUERYSTRING ERROR'); 
      ts($s,'QUERYSTRING');
      return false;
    }
  // return the boolean if the query just returned true  
    elseif($q === true) {
      mysqli_close($this->dbc);
      return $q;
    }
  // handle the results of a select  
    else { 
      $n = mysqli_num_rows( $q ); 
      if($n > 0) {
        $o = array();
        while($r = mysqli_fetch_assoc( $q )) {
          if($e) { foreach($r as $k=>$v) { $r[$k] = ents($v); } }
          $o[] = $r;
        }
      }
      else { $o = null; }
      mysqli_close($this->dbc);
      return $o;
    }
  }

}
