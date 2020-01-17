<?php

require_once('model/Manager.php');

class AdminManager extends Manager
{
	public function adminSignin($email, $password)
	{
		$dbh = $this->dbhConnect();
		$request = $dbh->prepare('SELECT * FROM admin WHERE email = :email AND password = :password');
		$request->execute(array('email'=> $email, 'password' => $password));
		$admin = $request->fetch();

		return $admin;
	}

}
