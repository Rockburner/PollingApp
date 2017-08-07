<?php
/**
 *  this class is the logout handling controller
 *  The user will click a button to request this page, the controller will remove the user session details and redirect to the home page.
 */

class logout {

  public function __construct(){
    
    unset( $_SESSION[SESS]['user'] );

    header("Location: /");
    exit();

  }

}


