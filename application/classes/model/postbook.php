<?php

defined('SYSPATH') or die('No direct script access.');

class Model_Postbook extends Model {
    
    
    public function getTypes() {
       $query = DB::select()->from('types')->execute();
       return  $query;
    }
}