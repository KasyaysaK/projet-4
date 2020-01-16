<?php 
require_once('model/Manager.php');

	class CommentManager extends Manager
	{
		public function getAllComments()
		{
			$dbh = $this->dbhConnect();
			$request = $dbh->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments ORDER BY comment_date DESC');

			return $request;
		}

		public function getComments($postId) 
		{
		    $dbh = $this->dbhConnect();
		    $comments = $dbh->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
		    $comments -> execute(array($postId));

		    return $comments;

		}

		public function postComment($postId, $author, $comment)
		{
		    $dbh = $this->dbhConnect();
		    $comments = $dbh->prepare('INSERT INTO comments (post_id, author, comment, comment_date, flagged) VALUES (?, ?, ?, NOW(), 0)');
		    return $comments->execute(array($postId, $author, $comment));
		}

		public function flaggedComment($commentId) {
			$dbh = $this->dbhConnect();
			$flaggedComment = $dbh->prepare('UPDATE comments SET flagged = 1 WHERE post_id = :id');

			$flaggedComment->execute(array(1, $commentId));
		}
	} 
	
