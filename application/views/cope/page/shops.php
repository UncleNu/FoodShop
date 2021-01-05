<?php
$xcrud->table('tbl_shops');
$xcrud->table_name('ข้อมูลร้านค้า ');
$xcrud->unset_view();
$xcrud->unset_remove();

if ($_SESSION['user_level'] > -1) {
    $xcrud->unset_remove();
}


// $xcrud->where("category_id = 1 ");
$xcrud->columns('shop_id,shop_code, shop_name , shop_type_id ,  IsActive ');
$xcrud->fields('shop_code, shop_name, shop_type_id, IsActive,IsDelete ');

// $xcrud->change_type('shop_password', 'password', 'md5', array('maxlength'=>10,'placeholder'=>'enter password'));
$xcrud->relation('shop_type_id','cnf_shop_type','shop_type_id','shop_type_name');

$xcrud->label('shop_id', 'ID');
$xcrud->label('shop_name', 'ชื่อร้าน');
$xcrud->label('shop_login', 'Login Name');
$xcrud->label('shop_password', 'Password');

$xcrud->label('shop_type_id', 'ประเภทร้านค้า');
$xcrud->label('shop_code', 'รหัส');

// $xcrud->change_type('IsActive', 'select','',array('Y' => 'Yes','N' => 'No', ));
// $xcrud->change_type('IsDelete', 'select','',array('N' => 'No','Y' => 'Yes', ));





// $xcrud->change_type('user_img', 'image');
// $xcrud->change_type('user_img', 'image', '', array('width' => 800, 'height' => 600));




$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');




// ******************************************** nested_table *******************************
 
$menus = $xcrud->nested_table('menus','shop_id','tbl_menus','shop_id'); // nested table
$menus->table_name('เมนูประจำร้าน ');

$menus->columns('menu_id, menu_code, menu_name, menu_price , IsActive  ');
$menus->fields('menu_code,  menu_name, menu_price , IsActive  ');
 



$menus->change_type('menu_img', 'image'); 
$menus->change_type('menu_img', 'image', '', array('width' => 800, 'height' => 600));
 

$menus->label('menu_id', 'ID');
$menus->label('menu_code', 'รหัสอาหาร');
$menus->label('menu_name', 'รายการอาหาร');
$menus->label('menu_price', 'ราคา');



$menus->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$menus->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$menus->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$menus->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');




 

echo $xcrud->render();
?>