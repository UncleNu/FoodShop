<?php

$xcrud->table('tbl_product_price');
$xcrud->table_name('ข้อมูลราคา');
$xcrud->columns('price_id, product_id, product_code,product_price1,product_price2,product_price3,product_price9,delete_flag,create_date,update_date');
$xcrud->fields('price_id,  product_id, product_code,product_price1,product_price2,product_price3,product_price9,delete_flag,create_date,update_date');

$xcrud->change_type('delete_flag', 'select', '', array('Y' => 'Yes', 'N' => 'No',));
$xcrud->relation('cnf_products', 'product_id', 'product_id', 'product_name');



echo $xcrud->render();
