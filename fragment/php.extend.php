<?php
/**
 *  file containing some extra, useful php procedural functions
 *  
 */

spl_autoload_register(
  function ($class_name) {
    $file = $class_name . '.class.php';
    if(is_file(CLASS_SRC . $file)) {  require_once( CLASS_SRC . $file);  }
    elseif(is_file(PAGE_SRC . $file)) { require_once( PAGE_SRC . $file); }
    else { return false; }
  }
);

