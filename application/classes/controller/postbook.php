<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Postbook extends Controller_Application {

    public function before() {
        parent::before();
        $this->template->postbook = 'active';
        $this->template->title = 'Записная книжка';
    }

    public function action_index() {

        $model = Model::factory('postbook');

        $sort = 'time';
        $order = 'DESC';
        $date = null;
        $count = null;

        if ($_POST) {


            $model->addPost($_POST);

            $this->request->redirect('/postbook');
        }

        if ($_GET) {

            if ($this->request->query('sort')) {
                $sorteble = $this->request->query('sort');
                list($sort, $order) = explode('_', $sorteble);
            }

            if ($this->request->query('date')) {
                $date = $this->request->query('date');
                $count = $model->counter('posts', 'date', '=', $date);
            }
        }

        if ($m = $this->request->query('m') AND $y = $this->request->query('y')) {

            $count = $model->counter('posts', 'date', 'LIKE', $y . '-' . $m . '%');
        } elseif ($count == NULL) {
            $count = $model->counter('posts');
        }

        $pagination = Pagination::factory(array(
                    'current_page' => array('source' => 'query_string', 'key' => 'page'), // source: "query_string" or "route"
                    'total_items' => $count,
                    'items_per_page' => 10,
        ));

        $data = array();

        if ($m AND $y) {
            $data['posts'] = $model->getPostByMonth(null, $y, $m, $sort, $order, $pagination->items_per_page, $pagination->offset);
        } else {
            $data['posts'] = $model->getAllPost(null, $sort, $order, $date, $pagination->items_per_page, $pagination->offset);
        }

        $data['sorts'] = Kohana::$config->load('sort');
        $data['page'] = $pagination->render();
        $data['types'] = $model->getTypes();
        $data['dates'] = $model->getDays();
        $data['calendar'] = HTML::calendar($data['dates']);
        $data['addform'] = View::factory('postbook/addform', array('types' => $data['types']));
        $data['postslist'] = View::factory('postbook/postslist', array('posts' => $data['posts']));

        $this->template->articles = View::factory('postbook/allposts', $data);
    }

}
