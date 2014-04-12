<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of filescanner
 *
 * @author Владик
 */
class Filescanner {
    
    static function scanFile($dir = '') {
  
if (is_dir($dir)) {
     $array = array();  
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
           if($file != '.' AND $file != '..')
           $array[] = $file;
        }
        closedir($dh);
      
        
         return $array;
    }
}
    }
    
    
    
    
}
