<?php
/**
 *  The 404Error page 
 */

class err404 extends page {
  
  public function __construct() {
    header("HTTP/1.0 404 Not Found");
    $this->body .= '<h2>No page found here, <a href="/" title="Return to start">return to main page</a></h2>'; 
    $this->outputPage();
  }
}
?>
