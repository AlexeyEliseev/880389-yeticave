<?php
require_once('mysql_helper.php');
require_once('functions.php');

$con = mysqli_connect("localhost", "root", "", "yeticave"); 
mysqli_set_charset($con,"utf-8");

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$form = $_POST['log'];

	$required = ['email', 'password'];
	$errors = [];
	foreach ($required as $field) {
	    if (empty($form[$field])) {
	        $errors[$field] = 'Это поле надо заполнить';
        }
    }

	$email = mysqli_real_escape_string($con, $form['email']);
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$res = mysqli_query($con, $sql);

	$user = $res ? mysqli_fetch_array($res, MYSQLI_ASSOC) : null;

	if (!count($errors) and $user) {
		if (password_verify($form['password'], $user['password'])) {
			$_SESSION['user'] = $user;
		}
		else {
			$errors['password'] = 'Неверный пароль';
		}
	}
	else {
		$errors['email'] = 'Такой пользователь не найден';
	}

	if (count($errors)) {
		$page_content = include_template('sign_in.php', ['form' => $form, 'errors' => $errors]);
	}
	else {
		header("Location: /sign_in.php");
		exit();
	}
}
else {
    if (isset($_SESSION['user'])) {
        $page_content = include_template('index.php');
    }
    else {
        $page_content = include_template('sign_in.php', []);
    }
}

print($page_content);
?>