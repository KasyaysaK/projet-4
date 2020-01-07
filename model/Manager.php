<?php 
<<<<<<< HEAD

namespace JeanForteroche\Blog\Model;

=======
>>>>>>> d2e9f24ba109198509739e6a46fe9190d0ce42ad
	class Manager
	{
		protected function dbhConnect()
		{
<<<<<<< HEAD
	        $dbh = new \PDO('mysql:host=localhost;dbname=jean_forteroche;charset=utf8', 'root', '');
=======
	        $dbh = new PDO('mysql:host=localhost;dbname=jean_forteroche;charset=utf8', 'root', '');
>>>>>>> d2e9f24ba109198509739e6a46fe9190d0ce42ad
	        return $dbh;	 
		}
	}