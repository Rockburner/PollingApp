<?php
/**
 *  login object class declaration
 */


/**
 *  NOTE: for simplicity of demonstration we are going to just show a VERY simple and NON-SECURE login 
 *  The password will be PLAIN-TEXT simply for cross-referencing the user.
 *  THIS IS BAD (obvs!)
 *  The correct practise is to store salted, hashed passwords in the db that are in fact irretrievable, and to compare the stored hash with a freshly generated (salted & hashed) string when the password is used for login.
 */

class login extends pageData {

  public $output = null;
  public $data = null;
  public $error = false;
  public $user = null;

  public function __construct() {
    parent::__construct();
    $this->attemptLogin();
  }

  protected function attemptLogin() {
    // sanitise the posted data
    $this->data = $this->dbSafe($_POST);

    // see if the user exists
    $user = $this->query("
      SELECT `user`.*
      FROM `user` 
      WHERE email = '".$this->data['email']."'
    ");

    if(!$user) {
      $this->error = 1;
      $this->output = "User details not found, please register before you can vote.";
      return;
    }

    $this->user = $user[0];

    $this->checkPassword();
    $this->checkRegistered();
    $this->assignUser();

  }

/**
 *  method to compare the posted password with the stored password.
 *  NOTE: normally this would compare salted and hashed strings, but for now we're doing a simple string compare
 */

  protected function checkPassword() {
    // case-sensitive check
    if( strcmp($this->data['password'],$this->user['password']) !== 0 ) {
      $this->error = 2;
      $this->output = "Password incorrect, please try again or reset your password";
      return;
    }
  }

  protected function checkRegistered() {
    if($this->user['confirmed'] == 0) {
      $this->error = 3;
      $this->output = "User has not confirmed account, please check your email inbox and spam box.";
      return;
    }
  }

/**
 *  method to assign the user details to the php session for the time being
 *
 *  @return [type] [description]
 */

  protected function assignUser() {
    if($this->error) { return; }

    $_SESSION[SESS]['user'] = $this->user['id'];
  } 
}
