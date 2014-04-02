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

        
        $data['articles'] = $this->articles->getArticles();  // берем массив статей из модели
        $data['status'] = $this->articles->getAllStatus();
        $data['addarticle'] = View::factory('AddArticle', $data);
        
        
        $this->template->title = 'Работа';
        $this->template->articles = View::factory('AllArticles', $data); // и отправляем его в вид
      
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