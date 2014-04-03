<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Articles extends Controller_Application {
    
    public $articles;


    public function before() {
        
        parent::before();
        
        
         $this->template->work = 'active';
        $this->template->addarticle = View::factory('AddArticle'); 
        $this->articles = ORM::factory('articles');
   
        
    }

    public function action_index() {
        $data = array();
       
        $data['articles'] = $this->articles->getArticles();
        
// берем массив статей из модели\
        if(!Session::instance()->get('status')) {
            
           $stat = $this->articles->getAllStatus();
        Session::instance()->bind('status',$stat);
        }
        
        $data['status'] = Session::instance()->get('status');
        $data['articleList'] = View::factory('articleList', $data);
        $data['addarticle'] = View::factory('addArticle', $data);
        
        
        $this->template->title = 'Работа';
        $this->template->articles = View::factory('articlesPage', $data); // и отправляем его в вид
      
    }

    public function action_edit() {
        
        
        $id = $this->request->param('id');
        
        $data['status'] = $this->articles->getAllStatus();
        $data['articles'] = $this->articles->getOneArticles($id);
        
        $this->template->articles = View::factory('editarticle', $data);
    }

    public function action_delete() {
        $id = $this->request->param('id');
        $articles = new Model_Articles($id);

        $articles->delete();
        $this->request->redirect(URL::base());
    }

}