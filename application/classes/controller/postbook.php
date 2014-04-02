<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Postbook extends Controller_Application {
    
    public function before() {
        parent::before();
         $this->template->postbook = 'active';
         $this->template->title = 'Записная книжка';
    }

        public function action_index()
	{
            if($_POST) {
                var_dump($_POST);
            }
            $data = array();
            $model = Model::factory('postbook');
        $data['types'] = $model->getTypes();   
         $this->template->articles = View::factory('postbook/addform',$data);
         
	}
}