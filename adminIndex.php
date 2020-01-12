<?php
require('controller/frontend.php');
require('controller/backend.php');
	
	try {
		switch ($_GET['action'])
		{
			case 'listPost': 
				listPost();
				break;
		}
	}

	catch(Exception $e) {
    $errorMessage = $e->getMessage();
	}