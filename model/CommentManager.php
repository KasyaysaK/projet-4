<?php 
	class CommentManager
	{
		public function getComments($postId) 
		{
		    $dbh = dbhConnect();
		    $comments = $dbh->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		    $comments -> execute(array($postId));

		    return $comments;
		}

		public function postComment($postId, $author, $comment)
		{
		    $dbh = $this->dbhConnect();
		    $comments = $dbh->prepare('INSERT INTO comments (post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		    $affectedLines = $comments->execute(array($postId, $author, $comment));

		    return $affectedLines;
		}

		private function dbhConnect()
		{
	        $dbh = new PDO('mysql:host=localhost;dbname=jean_forteroche;charset=utf8', 'root', '');
	        return $dbh;
	    }	  
	} 
	
