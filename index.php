<?php
header('Content-Type: text/html; charset=UTF-8');

require('app/config/config.php');
require('app/config/db.php');
require('app/functions/validate.function.php');
require('app/functions/helper.function.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	fieldRequired('Imię', $_POST['name']);
	fieldRequired('Nazwisko', $_POST['surname']);
	fieldRequired('E-mail', $_POST['email']);
	fieldRequired('Hasło', $_POST['password']);
	if(!$isError) {
		isEmail('E-mail', $_POST['email']);
	}

	if (!$isError) {
		$password = md5(PASS_SALT . $_POST['password']);
		$query = "INSERT INTO users SET user_name = '{$_POST['name']}', user_surname = '{$_POST['surname']}', user_email = '{$_POST['email']}', user_password = '$password'";
		if ($db->query($query)) {
			echo 'Data was inserted Successfully';
		} else {
			echo 'Data has not been inserted!';
		}
	}
}

include('templates/views/MasterPage.html.php');