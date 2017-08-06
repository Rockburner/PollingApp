<?php
/**
 *  The 'home' page class
 */

class home extends page {

  public $title =  'Welcome';

  protected $page = 'home';

  private $titleMarkup = null;
  private $loginMarkup = null;
  private $registerMarkup = null;

  function __construct () {
    parent::__construct();
    $this->makePage();
  }


  protected function makePage() {
    $this->login();
    $this->register();
    $this->outputPage();
  }


  protected function login() {
    $login = new form ();
    $login->action = '/login';
    $login->method = 'post';
    $login->id = 'login';
    $login->legend("Login to cast your vote");
    $login->para("If you already have your login details, enter them below to go the voting page");
    $login->inputEmail('email','Enter your email','Enter the correct email address',null);
    $login->inputPassword('password','Enter your Password',null);
    $login->inputHidden('login','login');
    $login->inputSubmit();
    $login->fieldset();


    $this->body .= $login->form();

  }


  protected function register() {
    $register = new form ();

    $register->action = '/register';
    $register->method = 'post';
    $register->id = 'register';

    $register->legend('To vote, first you must register');
    $register->para("Simply enter your name and email, and then choose your constituency by first choosing a nation using the option field below.");
    $register->para("In order to confirm that you are a valid user of this system, we require that you confirm your registration by receiving an email address.  Within this email address there will be a link that you need to click which will confirm your registration and allow you to vote.");
    $register->para("Please note that ALL fields are mandatory.");
    $register->inputText('name','Your Name',null,null,array('required'=>'required'),null,null,null,null,'Enter your name');
    $register->inputEmail('email','Your Email','Enter a valid email address',null,null,array('required'=>'required'));
    $register->inputPassword('password','Your Password',null,null);
    $register->inputPassword('pass_conf','Re-Enter your Password',null,null);
    $register->inputSelect('nation','Choose the nation you live in',null,null,$nations,'Choose your home nation',array('required'=>'required'));
    $register->inputHidden('register','register');
    $register->inputSubmit();
    $register->fieldset();

    $this->body .= $register->form; 
  }

  protected function nations() {
    $db = new dbc();
    $q =  "SELECT id,name FROM kineotest.nation ORDER BY name ASC";

    $this->nations = $db->query($q);
  }


}
