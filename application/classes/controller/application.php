<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Application extends Controller_Primary {
    public function before()
	{
            
		parent::before();
                
            
                 if (!Auth::instance()->logged_in()) {
                     
                     $this->request->redirect('login');
                 } else {
                     
                 }
		//Объясление моделей
                
                
	}
}