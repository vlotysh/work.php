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
     public function counter($table = 'posts',$where = NULL,$opt = NULL,$value = NULL) {
         if($where == NULL AND $value == NULL AND $opt == NULL ) {
            $query = DB::select(array('COUNT("*")','total_posts'))->from($table)->execute()->as_array();
         } else {
            $query = DB::select(array('COUNT("*")','total_posts'))->from($table)->where($where, $opt, $value)->execute()->as_array();   
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
    
     /**
     * Получение всех записей
      * Принимает тип, сортировка, порядок сортировки
     */
    public function getAllPost($type_id = NULL,$sort = 'time',$order = 'DESC',$date = null,$limit = 10,$offset = 0) {
        
       
        
      if($type_id) {#Если передан только тип
          $query = DB::select()
                  ->from('posts')
                  ->where('posts.type_id', '=', $type_id)
                  ->join('types')
                  ->on('posts.type_id' ,'=', 'types.id')
                  ->order_by($sort, $order)
                  ->offset($offset)
                  ->limit($limit)
                  ->execute()
                  ->as_array();
      }else {#Выборка всех записей
           $query = DB::select()
                   ->from('posts')
                   ->join('types')
                   ->on('posts.type_id' ,'=', 'types.id')
                   ->order_by($sort,$order)
                   ->offset($offset)
                   ->limit($limit)
                   ->execute()
                   ->as_array();
      }
      
      if($type_id && $date) {#Выборка записей по типу и дате
           $query = DB::select()
                  ->from('posts')
                  ->where('posts.type_id', '=', $type_id)
                  ->and_where('posts.date', '=', $date)
                  ->join('types')
                  ->on('posts.type_id' ,'=', 'types.id')
                  ->order_by($sort, $order)
                  ->offset($offset)
                  ->limit($limit)
                  ->execute()
                  ->as_array();
           
      }elseif ($date) {#Выборка записей по дате
               $query = DB::select()
                   ->from('posts')
                   ->and_where('posts.date', '=', $date)
                   ->join('types')
                   ->on('posts.type_id' ,'=', 'types.id')
                   ->order_by($sort,$order)
                   ->offset($offset)
                   ->limit($limit)
                   ->execute()
                   ->as_array();
        }
      
       
        return  $query;
    }
    
     public function getPostByMonth($type_id = NULL,$y =null,$m = null,$sort = 'time',$order = 'DESC',$limit = 10,$offset = 0) {
           $query = DB::select()
                   ->from('posts')
                   ->where('posts.date', 'LIKE', $y.'-'.$m.'%')
                   ->join('types')
                   ->on('posts.type_id' ,'=', 'types.id')
                   ->order_by($sort,$order)
                   ->offset($offset)
                   ->limit($limit)
                   ->execute()
                   ->as_array();
                  
           
           return  $query;
     }
    
    /**
     * Получение всех даты где есть записи
     */
    public function getDays() {
        $query = DB::select('date')
                  ->distinct(TRUE)
                  ->from('posts')
                  ->execute()
                  ->as_array();
        
        if($query) {
        foreach ($query as $q) {
            
            $dateArray[] = $q['date'];
                       
        }
        
        } else {
            return fale;
        }
        
        return   $dateArray;
        
    }
}