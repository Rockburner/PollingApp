<?php
/**
 *  the class declation for the database connection and operations
 */

class dbc extends base {

// these would be better off declared in a config file
  public $database = 'kineotest';
  public $username = 'kineotest';
  public $password = 'kineotest'; // note - horribly insecure db password!
  public $hostname = 'localhost';


  private $dbc = null;

  public function __construct() {
    parent::__construct();
    $this->connect();
  }

  protected function connect() {
    // connect to the database using the default values

    $this->dbc = new mysqli( $this->hostname, $this->username, $this->password, $this->database );
    if ($this->dbc->connect_errno) {
      die( "Failed to connect to MySQL: " . $this->dbc->connect_error );
    }
    // set the charset
    $this->dbc->set_charset ( 'utf-8' );  
  }

/**
 *  method to perform a query on the database and return either an error message, a boolean, or an array of returned data
 *
 *  @param  [string]  $s           [the query to be run]
 *  @param  [string] $associative  [optional : set the returned array to be an associative array, the string passed must match a key in the returned data. if the returned data has more than 2 elements the 'value' in the associative array will itself be an array]
 *
 *  @return [string/boolean/array]               [description]
 */

  public function query($s,$associative=null) {
    $this->ts($s);
    
    // perform the query
    $q = $this->dbc->query( $s );
    
    // if we don't get a positive result, use ts
    if(!$q) { 
      $this->ts($this->dbc->error,__function__.' ERROR'); 
      $this->ts($s);
      return false;
    }

    // return the boolean if the query just returned true  (DELETEs, UPDATEs, etc)
    elseif($q === true) {
      return $q;
    }
    
    // handle the results of a select and return an indexed array
    else { 
      $n = $q->num_rows; 
      if($n > 0) {
        $o = array();
        while($r = $q->fetch_assoc()) {
          // associative output
          if($associative) {
            $k = $r[ $associative ];
            if(count($r) == 2) {
              unset($r[ $associative ]);
              $o[ $k ] = implode($r); // yes - bit odd but it gets the value without needing the key
            }
            else {
              $o[ $k ] = $r;
            }
          }
          //indexed output  
          else {
            $o[] = $r;
          }
        }
      }
      else { $o = null; }
      return $o;
    }
  }

  public function dbSafe($t) {
    $o = null;
    if(is_array($t)) {
      $o = array();
      foreach($t as $k=>$v) { $o[$this->dbSafe($k)] = $this->dbSafe($v); }
    }
    else {
      $o = $this->dbc->real_escape_string( strip_tags(trim($t)) ); 
      if(is_int($o)) { settype($o,'int'); }
      }
    return  $o;
  }



}
