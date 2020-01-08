<?php 
	class Manager
	{
		protected function dbhConnect()
		{
	        $dbh = new PDO('mysql:host=localhost;dbname=jean_forteroche;charset=utf8', 'root', '');
	        return $dbh;	 
		}
	}