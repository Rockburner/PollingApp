<?php
/**
 *  php configurations
 */

// ERROR REPORTING
ini_set('error_reporting', E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);

set_time_limit (5);

// output headers
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Europe/London');


// SESSION
if (defined('SESS')) {
  if (session_name() != rawurlencode(SESS)) { // rawurlencoding added to prevent full-stops (periods) crashing session.
    session_name(rawurlencode(SESS)); // jbb = 2013-08-05 - added to prevent sessions interfering with each other on 147/squeeze-hosting
  }
}
session_start();
