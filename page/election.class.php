<?php
/**
 *  Election page class
 *
 *  This page would show the full details of the election to the voter, they would be able to view candidates by constituency.
 *  Ideally this would be a geo-graphical interface - eg a stylised map of the country by nation and constituency with eacy constituency clickable to shoa  modal popup of data for that constituency.
 *  As a nice touch, the User's constituency would be highlighted to make it stand out.
 *  Further, a serach system could be used to find particular candidates or parties
 */

class election extends page  {

  public function __construct() {
    parent::construct();
  }
}
