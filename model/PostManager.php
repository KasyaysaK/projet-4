<?php 
	class PostManager
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

	    private function dbhConnect()
	    {
	        $dbh = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	        return $dbh;
	    }
	}
	/*Ajouter public function admin pour pouvoir éditer le post*/