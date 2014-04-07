<?php

defined('SYSPATH') or die('No direct script access.');

class Model_Postbook extends Model {
    
    /**
     * Получения всех типов записей
     */
     public function getTypes() {
       $query = DB::select()->from('types')->execute()->as_array();
       
       return $query;
    }
    
    
    /**
     * Получения количества записей, возможны варианты с условием
     */
     public function counter($table = 'posts',$where = NULL,$value = NULL) {
         if($where == NULL AND $value == NULL) {
         $query = DB::select(array('COUNT("*")','total_posts'))->from($table)->execute()->as_array();
         } else {
          $query = DB::select(array('COUNT("*")','total_posts'))->from($table)->where($where, '=', $value)->execute()->as_array();   
         }
         
         return $query = (int)$query[0]['total_posts'];
     }
    
     /**
     * Добавление записей
     */
    public function addPost($array) {
        $time = time();
        
        $date = date('Y-m-d',$time);
        
        $query = DB::insert('posts',array('title', 'content','time','date','type_id'))->values(array($array['title'], $array['text'],$time,$date,$array['type']));
        
        $result = $query->execute();
        
        if(is_array($result)) {
            return true;
        } else {
             return false;
        }
    }
    
    public function getAllPost($type_id = NULL,$order = 'DESC',$limit = 10,$offset = 0) {
        
       
        
      if($type_id) {
          $query = DB::select()
                  ->from('posts')
                  ->where('posts.type_id', '=', $type_id)
                  ->join('types')
                  ->on('posts.type_id' ,'=', 'types.id')
                  ->order_by('time', $order)
                  ->offset($offset)
                  ->limit($limit)
                  ->execute()
                  ->as_array();
      }else {
           $query = DB::select()
                   ->from('posts')
                   ->join('types')
                   ->on('posts.type_id' ,'=', 'types.id')
                   ->order_by('time',$order)
                   ->offset($offset)
                   ->limit($limit)
                   ->execute()
                   ->as_array();
      }
       
        return  $query;
    }
}