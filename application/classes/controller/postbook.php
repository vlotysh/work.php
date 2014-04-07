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
             $model = Model::factory('postbook');
            if($_POST) {
                               
                
                $model->addPost($_POST);
                                     
                $this->request->redirect('/postbook');
            }
            
        $data = array();
       
       $data['posts'] = $model->getAllPost();
        
        
        $data['types'] = $model->getTypes();   
        var_dump( $data['posts']);
       foreach ($data['posts'] as $po) {
           echo $po['title'].' ';
            
            $ar[] =  $po['date'];
        }
     
     //  // 
        $data['addform'] = View::factory('postbook/addform',array('types'=>$data['types']));
       $data['postslist'] = View::factory('postbook/postslist');
        $this->template->articles = View::factory('postbook/allposts',$data);
         
	}
}