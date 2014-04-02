<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Primary extends Controller_Template {
    
    public function before() {
        parent::before();
        
        $this->template->work= '';
        $this->template->postbook = '';
        $this->template->articles = '';
        $this->template->title = '';
        $this->template->addarticle ='';
        
        
        $this->template->scripts = Filescanner::scanFile('media/js');
        $this->template->style = Filescanner::scanFile('media/css');
       
  
        }

        
    }