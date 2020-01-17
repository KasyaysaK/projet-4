<?php 
require_once('model/Manager.php');

	class PostManager extends Manager
	{
		public function getPosts()
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date ASC');

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

		public function createPost($title, $content) 
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->prepare('INSERT INTO posts (title, content, creation_date) VALUES (?, ?, NOW())');
			$newPost = $request->execute(array($title, $content));

			return $newPost;
		}

		public function editPost($id, $title, $content)
		{
			var_dump($id);
			$dbh = $this->dbhConnect();
			$request = $dbh->prepare('UPDATE posts set title = ?, content = ? WHERE id = ?');
			$editedPost = $request->execute(array($title, $content, $id));

			return $editedPost;
		}		

		public function erasePost($id)
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->prepare('DELETE FROM posts WHERE id = ?');
			$deletedPost = $request->execute(array($id));
		}
	}