<?php

require_once('functions.php');
require_once('data.php');
$page_content = include_template('index.php', ['lots' => $lots , 'categories'=> $categories]);
$layout_content = include_template('layout.php', [
    'content' => $page_content, 
    'name' => $user_name, 
    'title' => $title ]);

print($layout_content);
?>
