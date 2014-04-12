<?php

defined('SYSPATH') or die('No direct script access.');

class Model_Articles extends ORM {

    protected $_table_name = 'articles';

    public function getArticles() { // функция получения всех статей из БД как массива
        return DB::select('articles.id', 'articles.text', 'articles.name', 'articles.url', 'articles.date', 'articles.status_id', 'status.status_name')
                        ->from('articles')
                        ->order_by('articles.id', 'DESC')
                        ->join('status')
                        ->on('articles.status_id', '=', 'status.id')
                        ->execute()
                        ->as_array();
        
        
    }

    public function getOneArticles($id = '') { // функция получения всех статей из БД как массива
        $query = DB::select('*')
                ->from('articles')
                ->join('status')
                ->on('articles.status_id', '=', 'status.id')
                ->where('articles.id', '=', $id)
                ->execute()
                ->as_array();

        return $query = $query[0];
    }

    public function addArticle($name, $url, $text, $date) { // функция добавления новой статьи в БД
        return DB::insert('articles', array('name', 'url', 'text', 'date', 'status_id'))
                        ->values(array($name, $url, $text, $date, 1))
                        ->execute();
    }

    public function getAllStatus() {
        return DB::select('id', 'status_name')
                        ->from('status')
                        ->execute()
                        ->as_array();
    }

    public function changeStatus($id, $status) {
       
        $query = DB::update('articles')->where('id', '=', $id)->set(array('status_id' => $status));
        
        if ($query) {
            return TRUE;
        }else {
             return FALSE;
        }
    }

}