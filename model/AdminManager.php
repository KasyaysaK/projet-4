<?php

require_once('model/Manager.php');

class AdminManager extends Manager
{
	public function adminSignin($email, $password)
	{
		$dbh = $this->dbhConnect();
		$request = $dbh->prepare('SELECT * FROM admin WHERE email = :email');
		$request->execute(array('email'=> $email));
		$admin = $request->fetch();

		return $admin;
	}

}
