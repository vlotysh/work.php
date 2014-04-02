<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller {

    public function action_getarticles() { // метод вывода всех статей
        if (Request::initial()->is_ajax()) { // выполняем только если запрос был через Ajax
            $articles = new Model_Articles();
            $data['articles'] = $articles->getArticles();
            $data['status'] = Session::instance()->get('status');// получаем массив со всеми статьями
            echo View::factory('articleList', $data)->render(); // выводим статьи в виде
        }
    }

    public function action_addarticle() {
        if (Request::initial()->is_ajax()) { // выполняем только если запрос был через Ajax
            sleep(2); // искусственная задержка для наглядности
            $result = array('code' => 'error'); // по умолчанию возвращаем код с ошибкой

            $post = Validation::factory($_POST); // готовимся к проведению валидации
            $post->rule(TRUE, 'not_empty')
                    ->rule('name', 'min_length', array(':value', 3));

            if ($post->check()) { // проводим валидацию
                $name = Arr::get($_POST, 'name', '');
                $text = Arr::get($_POST, 'text', '');
                $url = Arr::get($_POST, 'url', '');
                $date = time();

                $articles = new Model_Articles();
                if ($articles->addArticle($name, $url, $text, $date)) { // если валидация прошла успешно и запись в БД новой статьи прошла успешно
                    $result['code'] = 'success'; // возвращаем код успеха!
                }
            }

            echo json_encode($result); // на выходе отдаем код в формате JSON
        }
    }

    public function action_changestatus() {
        if (Request::initial()->is_ajax()) { // выполняем только если запрос был через Ajax
            $result = array('code' => 'error');
            sleep(2);

            $id = Arr::get($_POST, 'id', '');
            $status = Arr::get($_POST, 'status', '');
            $articles = ORM::factory('articles', $id);
            
            $articles->set('status_id',$status)->save();
            
            if ($articles) {
                $result['code'] = 'success';
                  $result['status'] = $status;
            }
            
             echo json_encode($result); 
        }
    }

}