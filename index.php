<?php
date_default_timezone_set("Europe/Moscow");
require_once('functions.php');
require_once('data.php');

$con = mysqli_connect("localhost", "root", "", "yeticave"); 
mysqli_set_charset($con,"utf-8");

$sql1 = "SELECT * FROM lots"; 
$result_lots = mysqli_query($con, $sql1); 
$lots_sql = mysqli_fetch_all($result_lots, MYSQLI_ASSOC);

$sql2 = "SELECT * FROM categories"; 
$result_categories = mysqli_query($con, $sql2); 
$categories_sql = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);

$page_content = include_template('index.php', ['lots_sql' => $lots_sql , 'categories'=> $categories]);
$layout_content = include_template('layout.php', [
    'content' => $page_content, 
    'userName' => $user_name, 
    'title' => $title,
    'categories_sql'=> $categories_sql]);

print($layout_content);
?>
