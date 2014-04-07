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
        
         $count =  $model->counter('posts');

        $pagination = Pagination::factory(array(
                    
                    'current_page' => array('source' => 'query_string', 'key' => 'page'), // source: "query_string" or "route"
                    'total_items' => $count,
                    'items_per_page' => 10,
                    ));
                    $this->request;
        /*
        $ms_data = $this->MailModel->getAllOutInBoxPm($user->id, $pagination->items_per_page, $pagination->offset, $type);


        //то тогда не показывать кнопку "Загрузить еще"

        
         * 
         *          */
            
        $data = array();
       
       $data['posts'] = $model->getAllPost(null,$pagination->items_per_page, $pagination->offset);
        
       
       $data['page'] = $pagination->render();
        
        $data['types'] = $model->getTypes();   
         

       $data['addform'] = View::factory('postbook/addform',array('types'=>$data['types']));
       $data['postslist'] = View::factory('postbook/postslist',array('posts'=>$data['posts']));
       $this->template->articles = View::factory('postbook/allposts',$data);
         
	}
}