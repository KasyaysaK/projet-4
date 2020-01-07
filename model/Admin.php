<?php 

namespace JeanForteroche\Blog\Model;

require_once('model/Manager.php');

class Admin extends Manager
{
	public function adminConnect($username, $password)
	{
		$dbh = $this->dbhConnect();
		$request = $dbh->prepare('SELECT * FROM admin WHERE username = :username AND password = :password');
		$request->execute([$username]);

		return $result;
	}
}
