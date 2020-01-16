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
			$request = $dbh->execute('INSERT INTO posts (title, content) VALUES (:title, :content)');
			$newPost = $request->execute(array($title, $content));

			return $newPost;
		}

		public function editPost($title, $content, $id)
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->prepare('UPDATE posts set title = :title, content = :content WHERE id = :id');
			$editedPost = $request->execute(array($title, $content, $id));

			return $editedPost;
		}	

		public function erasePost($postId, $commentId)
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->preprare('DELETE posts, comments FROM posts, comments WHERE posts.id = ? AND comments.post_id = ?');
			$deletedPost = $request->execute(array($postId, $commentId));

			return $deletedPost;
		}
	}