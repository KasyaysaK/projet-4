<?php 
require_once('model/Manager.php');

	class PostManager extends Manager
	{
		public function getPosts()
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->query('SELECT id, title, content FROM posts ORDER BY creation_date ASC LIMIT 0, 5');

			return $request;
		}
	

		public function getPost($postId) 
		{
		    $dbh = $this->dbhConnect();
		    $request = $dbh->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
		    $request->execute(array($postId));
		    $post = $request->fetch();

		    return $post;
		}
	}
	/*Ajouter public function admin pour pouvoir éditer le post*/