<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Postbook extends Controller_Application {
    
    public function before() {
        parent::before();
         $this->template->postbook = 'active';
    }

        public function action_index()
	{
        
         $this->template->title = 'Записная кунижка';
         
	}
}