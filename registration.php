<?php
require_once('mysql_helper.php');
require_once('functions.php');

$con = mysqli_connect("localhost", "root", "", "yeticave"); 
mysqli_set_charset($con,"utf-8");

$tpl_data = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $form = $_POST['reg'];
    $errors = [];

    $req_fields = ['email', 'password', 'name', 'message'];

    foreach ($req_fields as $field) {
        if (empty($form[$field])) {
            $errors[] = "Не заполнено поле " . $field;
        }
    }

    if (empty($errors)) {
        $email = mysqli_real_escape_string($con, $form['email']);
        $sql = "SELECT id FROM users WHERE email = '$email'";
        $res = mysqli_query($con, $sql);

        $filename = uniqid() . '.jpg';
        $form['avatar'] = $filename;
        move_uploaded_file($_FILES['image']['tmp_name'], '/img' . $filename);

        if (mysqli_num_rows($res) > 0) {
            $errors[] = 'Пользователь с этим email уже зарегистрирован';
        }
        else {
            $password = password_hash($form['password'], PASSWORD_DEFAULT);

            $sql_user = "INSERT INTO users (registrationdate, email, password, name, avatar, info) VALUES (NOW(), ?, ?, ?, ?, ?)";
            $stmt_add = db_get_prepare_stmt($con, $sql_user, [$form['email'], $password, $form['name'], $form['avatar'], $form['message']]);
            $res = mysqli_stmt_execute($stmt_add);
        }

        if ($res && empty($errors)) {
            header("Location: /pages/my-lots.html");
            exit();
        }
    }

    $tpl_data['errors'] = $errors;
    $tpl_data['values'] = $form;
}

$page_content = include_template('registration.php', $tpl_data);

print($page_content);
?>