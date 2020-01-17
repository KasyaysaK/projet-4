<?php 

	namespace JeanForteroche\Blog\Model;

	require_once('model/Manager.php');


	class HomepageManager extends Manager
	{
		public function showHome()
		{
			$dbh = $this->dbhConnect();
			$homepage = $dbh->query('SELECT about, book_preview FROM home');

			return $homepage;
		}

	}