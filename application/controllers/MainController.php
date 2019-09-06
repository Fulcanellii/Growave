<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Main;

class MainController extends Controller
{
	public function indexAction()
    {
        $model = new Main();
        $list = $model->articlesList($this->route);
        $tags = $model->getTags();


        $this->view->render('index', [
            'list' => $list,
            'tags' => $tags,
        ]);
    }

    public function pageAction()
    {                     
        $model = new Main();
        $tags = $model->getTags();
        if(isset($_GET['id_tag'])) {
            $articles = $model->getArticles($_GET['id_tag']);
        }
   
        $this->view->render('page', [
            'tags' => $tags,
            'articles' => $articles,
        ]);
    }

    public function addAction()
    {
        $model = new Main();
        if (!empty($_POST)) {
            $model->setAttributes($_POST);
            if ($model->save()){
                $model->insertTag();
                $this->view->redirectJs(' ');
            } else {
                $this->view->message('error', implode('<br />', $model->error), $model->error);
            }

        }

    	$vars = [
        	'tags' => $this->model->getTags(),
        ];
        $this->view->render('add', $vars);
    }

    public function articlesAction($id)
    {
        $model = new Main();
        $model->findOne($id);
        $tags = $model->getTags();

        $this->view->render('articles', [
            'data' => $model,
            'tags' => $tags,
        ]);
    }
}