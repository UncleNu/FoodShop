<?php

$xcrud->table('tbl_menus');
$xcrud->table_name('เมนูประจำร้าน ');
$xcrud->columns('menu_img, menu_id, menu_name, menu_price , IsActive  ');
$xcrud->fields('menu_img,  menu_name, menu_price , IsActive  ');
 



$xcrud->relation('shop_id','tbl_shops','shop_id','shop_name');

$xcrud->change_type('menu_img', 'image'); 
$xcrud->change_type('menu_img', 'image', '', array('width' => 800, 'height' => 600));
 
$xcrud->label('menu_img', 'Image');
$xcrud->label('menu_name', 'รายการอาหาร');
$xcrud->label('menu_price', 'ราคา');



$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');



echo $xcrud->render();
?>