<?php
/**
 *  The 'home' page class
 */

class home extends page {

  public $title =  'Welcome';

  protected $pageclass = 'home';

  private $titleMarkup = null;
  private $loginMarkup = null;
  private $registerMarkup = null;

  public function __construct () {
    parent::__construct();
    $this->makePage();
  }


  protected function makePage() {
    // set a page title
    $this->body .= $this->tag('h1',null,"Welcome to E-Voting");

    // check for a login request
    if(isset($_POST['login'])) {
      $this->login = new login();
      if(!$this->login->error) {
        header('Location:/vote');
        exit();
      }
    }

    // check for a registration request
    if(isset($_POST['register'])) {
      $this->registration = new registration();
    }

    // generate the login form
    $this->loginForm();
    
    // generate the registration form
    $this->registerForm();
    
    // push to the output method
    $this->outputPage();
  }

/**
 *  method to output the login form markup
 *
 *  @return [type] [description]
 */

  protected function loginForm() {
    $login = new form ();

    $login->action = '/';
    $login->method = 'post';
    $login->id = 'login';
    if(isset($this->login) && $this->login->error) {
      $login->class = 'error';
    }

    $login->legend("Login to cast your vote");

    if(isset($this->login) && $this->login->error) {
      $login->para("Login Failed. ".$this->login->output);
    }
    
    $login->para("If you already have your login details, enter them below to go the voting page");
    $login->inputEmail('email','Enter your email','Enter the correct email address',$this->login->data['email']);
    $login->inputPassword('password','Enter your Password',null);
    $login->inputHidden('login','login');
    $login->inputSubmit();
    $login->fieldset();

    $this->body .= $login->form();

  }

/**
 *  method to output the registration form markup
 *  In the event of a failed registration attempt this form will be prepopulated with the data from the failed attempt
 *
 *  @return [type] [description]
 */

  protected function registerForm() {
    $this->pageData->nations();

    $register = new form ();

    $register->action = '/';
    $register->method = 'post';
    $register->id = 'register';

    $register->legend('To vote, first you must register');
    $register->para("PLEASE NOTE: this form does not currently have any effect on the database, please use a demo user to login above.");
    $register->para("Simply enter your name and email, and then choose your constituency by first choosing a nation using the option field below.");
    $register->para("In order to confirm that you are a valid user of this system, we require that you confirm your registration by receiving an email address.  Within this email address there will be a link that you need to click which will confirm your registration and allow you to vote.");
    $register->para("Please note that ALL fields are mandatory.");
    $register->inputText('name','Your Name',null,null,array('required'=>'required'),null,null,null,null,'Enter your name');
    $register->inputEmail('email','Your Email','Enter a valid email address',null,null,array('required'=>'required'));
    $register->inputPassword('password','Your Password',null,null);
    $register->inputPassword('pass_conf','Re-Enter your Password',null,null);
    $register->inputSelect('nation','Choose the nation you live in',null,null,$this->pageData->nations,'Choose your home nation',array('required'=>'required'));
    $register->inputHidden('register','register');
    $register->inputSubmit();
    $register->fieldset();

    $this->body .= $register->form; 
  }



}
