<?php
/**
 *  main handling file (controller)
 */

/* set constants */
define('SESS','KineoVoting');
define('FRAGMENT','fragment/');
define('CLASS_SRC','class/');
define('PAGE_SRC','page/');
define('DEFAULT_PAGE','home');
define('VOTING_WINDOW',2); // the period of time (in weeks) that polling will be open for
define('CONFIG','config/');

// include the ph configurations file
require_once(CONFIG.'config.php');

//  include some external library files 
require_once(FRAGMENT.'php.extend.php');

/**
 *  what we do here is take the request from the url and decide what we're going to server back to the user.
 *  We use the getPage function for this
 */

$site = new site();
echo $site->output;
