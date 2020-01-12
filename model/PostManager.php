<?php 
require_once('model/Manager.php');

	class PostManager extends Manager
	{
		public function getPosts()
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date ASC LIMIT 0, 5');

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

		public function addPost() 
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->prepare('INSERT INTO posts (title, content) VALUES (?, ?)');
			$newPost = $request;

			return $newPost;
		}

		public function publishPost($title, $content) 
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->prepare('INSERT INTO posts (title, content) VALUES (?, ?)');

			$publishedPost = $request;

			return $publishedPost;
		}

		public function editPost($id, $title, $content)
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->prepare('UPDATE posts set title = :title, content = :content WHERE id = :id');
		}

		public function deletePost($postId, $commentId)
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->preprare('DELETE posts, comments FROM posts, comments WHERE posts.id = ? AND comments.post_id = ?');
			$deletedPost = $request->execute(array($postId, $commentId));

			return $deletedPost;
		}
	}
	/*Ajouter public function admin pour pouvoir éditer le post*/