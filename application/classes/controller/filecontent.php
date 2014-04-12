<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Filecontent extends Controller_Application {
    
    public function action_index() {
        
        
        
        
        $data['file'] = file_get_contents('application/classes/controller/1.php', FILE_USE_INCLUDE_PATH);
        
       $data['message'] =  Session::instance()->get_once('message','');
       var_dump($data);
       $data['error'] = Session::instance()->get_once('error','');
if($_POST) {
    
            
           file_put_contents('application/classes/controller/1.php',$_POST['code']);
                Session::instance()->set('message', 'Файл обновлен');
           
            
            $this->request->redirect('/filecontent');
}

    $this->template->articles = View::factory('filecontent',$data);

        
    }
}