<?php 
<<<<<<< HEAD

namespace JeanForteroche\Blog\Model;

=======
>>>>>>> d2e9f24ba109198509739e6a46fe9190d0ce42ad
require_once('model/Manager.php');

	class CommentManager extends Manager
	{
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
		    $comments = $dbh->prepare('INSERT INTO comments (post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		    $affectedLines = $comments->execute(array($postId, $author, $comment));

		    return $affectedLines;
		}
	} 
	
