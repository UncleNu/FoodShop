<?php
$xcrud->table('cnf_products');
$xcrud->where("category_id = 1 ");


echo $xcrud->render();
?>