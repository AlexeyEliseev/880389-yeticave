<?php
require_once('functions.php');
require_once('mysql_helper.php');

$con = mysqli_connect("localhost", "root", "", "yeticave"); 
mysqli_set_charset($con,"utf-8");

$sql = "SELECT * FROM categories"; 
$result_category = mysqli_query($con, $sql); 
$category_sql = mysqli_fetch_all($result_category, MYSQLI_ASSOC);

$page_content2 = include_template('add.php', ['category_sql' => $category_sql]);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lot = $_POST['lot'];

        $filename = uniqid() . '.jpg';
        $lot['image'] = $filename;
        move_uploaded_file($_FILES['lot_img']['tmp_name'], '/img' . $filename);

        $sql_add = 'INSERT INTO lots (dt_add, categorie_id, user_id, lotname, description, image) VALUES (NOW(), ?, 1, ?, ?, ?)';

        $stmt = db_get_prepare_stmt($con, $sql_add, [$lot['category'], $lot['name'], $lot['description'], $lot['image']]);
        $res = mysqli_stmt_execute($stmt);

        if ($res) {
            $lot_id = mysqli_insert_id($con);

            header("Location: lot.php?id=" . $lot_id);
        }
}


print($page_content2);
?>