<?php
/**
 *  Registration class declaration
 */


/**
 *  This class handles the registration request.
 *  It will do the following:
 *    Take in the posted data and sanitise it
 *    Check the user is a real person (by referring to the National voter register via API)
 *    Check that the user has not already registered, buy comparing the email address to those in the database
 *      If so, the user will be informed that an account exists and the login / forgotton password forms will be shown
 *    Include the users details in the user table, with a value of 0 in the 'confirmed' column
 *    Send an email to the user's email address including a confirmation link which includes a unique random-string hash that is placed into the 'conf_hash' column.
 *    When the user requests to confirm their account (by clicking the link in the email), the confirmation hash will be compared with those in the table and the 'confirmed' value set to 1. (the conf_hash will then be nullified)
 *      Note: the conf_hash values could be stored in a seperate table to save storage space - each row would be removed upon user confirmation.
 *    
 */

class register extends pagedata {
}
