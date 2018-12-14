<?php
require_once('functions.php');

if (isset($_GET['tab'])) {
	$tab = $_GET['tab'];
}
else {
	http_response_code(404);
	die();
}
$con = mysqli_connect("localhost", "root", "", "yeticave"); 
mysqli_set_charset($con,"utf-8");

$lotparam = "SELECT lotname, cost, image, description, categorie_id FROM lots WHERE id=" . $tab;
$lot_p = mysqli_query($con, $lotparam); 
$result = mysqli_fetch_all($lot_p, MYSQLI_ASSOC);

$categorie_name = "SELECT l.id, name FROM lots l JOIN categories c ON l.categorie_id = c.id WHERE l.id=" . $tab;
$lot_c = mysqli_query($con, $categorie_name); 
$result_p = mysqli_fetch_all($lot_c, MYSQLI_ASSOC);

$page_content1 = include_template('lot.php', ['result' => $result , 'result_p' => $result_p]);

print($page_content1);
?>