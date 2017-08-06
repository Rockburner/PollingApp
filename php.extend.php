<?php
/**
 *  file containing some extra, useful php procedural functions
 *  These are sourced from my own libraries, JBB
 */

spl_autoload_register(function ($class_name) {
    try {
      include FRAGMENT . $class_name . '.class.php';
    }
    catch(Exception $e) {
      echo $class_name . 'File not found: '.$e->getMessage();
    }
});

