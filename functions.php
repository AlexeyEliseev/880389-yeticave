<?php
function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require($name);

    $result = ob_get_clean();

    return $result;
}

function form($num) {
   $num = ceil($num);
   if ($num < 1000) {
     $num;
   } else {
        if ($num > 1000) {
        $num = number_format($num, 0, ' ', ' ');
        }
   }
   $num .=" ₽";
   return $num;
}
?>
