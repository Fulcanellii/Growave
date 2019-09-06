<?php

namespace application\models;

use application\core\Model;
use application\core\View;

class Main extends Model
{
    public $error = [];
	public $id;
	public $title;
	public $date;
	public $text;
    public $tag;
    public $id_tag;
    public $id_article;

    public function validateArticle()
    {
        
        if (mb_strlen($this->title) < 2 or mb_strlen($this->title) > 64) {
            $this->error['title'] = 'Тема статьи должна содержать от 2 до 64 символов';
        }

        if (mb_strlen($this->text) < 2 or mb_strlen($this->text) > 400) {
            $this->error['text'] = 'Текст статьи должна содержать от 2 до 400 символов';
        }

        if ($this->date == '') {
            $this->error['date'] = 'Выберите дату';
        } else if (!is_numeric(strtotime($this->date)) && preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/", $post['date'])) {
            $this->error['date'] = 'Не правильный формат даты';
        }

        if (!empty($this->error)) {
            return false;
        }
        return true;
    }

	public function isNewRecord()
    {
        if ($this->id !== null && $this->db->exists('articles', 'id', $this->id)) {
            return false;
        } else {
            return true;
        }

    }

    public function save()
    {
        if ($this->validateArticle()) {

            $params = [
                'id' => $this->id,
                'title' => $this->title,
                'date' => $this->date,
                'text' => $this->text,
            ];

            if ($this->isNewRecord()) {

                $this->db->query('INSERT INTO articles (id, title, date, text) VALUES (:id, :title, :date, :text)', $params);
                if ($this->db->lastInsertId() > 0) {
                    $this->id = $this->db->lastInsertId();
                    return true;
                }
            }
        }
        return false;
    }

    public function findOne($id)
    {
        $data = $this->db->row('SELECT * FROM articles LEFT JOIN articles_tags ON articles_tags.id_article = articles.id RIGHT JOIN tags ON tags.id_tag = articles_tags.id_tag WHERE articles.id = :id', ['id' => $id]);
        if (!empty($data)) {
            $this->setAttributes($data[0]);
            return true;
        }
        View::errorCode(404);

    }

    public function setAttributes($data)
    {
        $this->id = isset($data['id']) ? (int)$data['id'] : null;
        $this->title = $data['title'] ?? null;
        $this->date = $data['date'] ?? null;
        $this->text = $data['text'] ?? null;
        $this->tag = $data['tag'] ?? null;
        $this->id_tag = $data['id_tag'] ?? null;
    }
    
	public function articlesList($route)
	{
		return $this->db->row('SELECT * FROM tags LEFT JOIN articles_tags ON articles_tags.id_tag = tags.id_tag RIGHT JOIN articles ON articles_tags.id_article = articles.id ORDER BY articles.id DESC');
	}

	public function getTags()
    {
    	$tag = "SELECT tags.tag, tags.id_tag, COUNT(articles_tags.id_article) as count FROM articles_tags RIGHT JOIN tags
		ON tags.id_tag = articles_tags.id_tag
		GROUP BY tags.id_tag";

		$rows = $this->db->row($tag);
		$num_rows = count($rows);
		return $rows;
		
    }

    public function getArticles($id)
    {

    	$tags = ("SELECT * FROM articles LEFT JOIN articles_tags ON articles_tags.id_article = articles.id RIGHT JOIN tags ON tags.id_tag = articles_tags.id_tag WHERE articles_tags.id_tag = '$id' ORDER BY articles.id DESC");

        $rows = $this->db->row($tags);
        
        return $rows;   
    }

    public function insertTag()
    {
        $params = [
            'id' => $this->id,
            'id_tag' => $this->tag,
            'id_article' => $this->db->lastInsertId(),
        ];
         $this->db->query('INSERT INTO articles_tags (id, id_tag, id_article) VALUES(:id, :id_tag, :id_article)', $params);
    }
}


