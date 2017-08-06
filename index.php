<?php
/**
 *  main handling file (controller)
 */


/* set some environment variables */
// ERROR REPORTING
ini_set('error_reporting', E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);

/* set constants */
define('SESS','KineoVoting');
define('FRAGMENT','');
define('DEFAULT_PAGE','home');

// SESSION
if (defined('SESS')) {
  if (session_name() != rawurlencode(SESS)) { // rawurlencoding added to prevent full-stops (periods) crashing session.
    session_name(rawurlencode(SESS)); // jbb = 2013-08-05 - added to prevent sessions interfering with each other on 147/squeeze-hosting
  }
}
session_start();



/**
 *  include some external library files and class definitions
 */

require_once('php.extend.php');

// output headers
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Europe/London');

/**
 *  what we do here is take the request from the url and decide what we're going to server back to the user.
 *  We use the getPage function for this
 */

$site = new site(true);

