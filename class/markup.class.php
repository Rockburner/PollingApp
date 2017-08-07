<?php
/**
 *  basic object for writing html markup
 */

class markup extends base {


  public $comments = false;

  public function __construct() {
    parent::__construct();
  }

  /**
 *  method to generate the markup for an unbulleted HTML list from a PHP array of information, uses an optional callback function for each list item if the array is nested and the callback function is named
 *
 *  @param  [array] $array  [php array of strings or nested arrays]
 *  @param  [string] $f     [name of callback function to handle nested array data]
 *  @param  [string] $id    [optional id value for list tag]
 *  @param  [string] $class [optional class value for list tag]
 *
 *  @return [string]        [generated HTML markup string]
 */

  public function ul($array,$f=null,$id=null,$class=null) {
    if(is_array($array)) {
      $ul = null;
      foreach($array AS $i=>$a) { 
        if(empty($a)) { continue; }
        if($f && is_array($a)) {
          $c = $this->$f($a);
        }
        else {
          $c = $a;
        }
        if(!$c) { continue; }
        $liAttr = array();
        $ul .= $this->tag('li',$liAttr, $c );  
        if($z) { $zz++; }
      }
      return $this->tag('ul',array('id'=>$id,'class'=>$class), $ul );
    }
  }
}
