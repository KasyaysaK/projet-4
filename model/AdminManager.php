<?php

namespace JeanForteroche\Blog\Model;

require_once('model/Manager.php');

class AdminManager extends Manager
{
	public function signIn()
	{
		$dbh = $this->dbhConnect();
		$request = dbh->prepare('SELECT * FROM admin WHERE username = :pseudo');
		$request->execute(array('username' => $username));
		$result = $request->fetch();

		$signedIn = $request->fetch();
	}

	public function signOut() 
	{
		$dbh = $thid->dbhConnect();
		$request = $dbh->prepare('UPDATE member SET email = '?', ')
	}
}
