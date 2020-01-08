<?php

require_once('model/Manager.php');

class AdminManager extends Manager
{
	public function adminSignin()
	{
		$dbh = $this->dbhConnect();
		$request = $dbh->prepare('SELECT * FROM admin WHERE username = :username AND password = :password');
		$request->execute(array(':username'=>$_POST['username'], 'passwor'=>$_POST['password']));
		$admin = $request->fetch();

		return $admin;
	}

}
