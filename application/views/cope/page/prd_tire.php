<?php
 
$xcrud->table('cnf_products');
$xcrud->table_name('ข้อมูลเกี่ยวกับยาง');
$xcrud->unset_add();
 
$xcrud->where("category_id = 1 ");
$xcrud->columns('product_id, product_code, product_name,SIZE1,SIZE2,SIZE3,product_model,brand_id, product_rate ,delete_flag');
$xcrud->fields('product_code, product_name,SIZE1,SIZE2,SIZE3,product_model,brand_id, product_rate , delete_flag');

$xcrud->relation('brand_id','cnf_barnd','brand_id','brand_name');
$xcrud->change_type('delete_flag', 'select','',array('Y' => 'Yes','N' => 'No', ));
$xcrud->change_type('product_rate', 'select', '', array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5',));

$xcrud->label('product_id', 'ID');
$xcrud->label('product_code', 'รหัสสินค้า');
$xcrud->label('product_name', 'ชื่อสินค้า');
$xcrud->label('SIZE1', 'หน้ากว้าง');
$xcrud->label('SIZE2', 'ซีรี่');
$xcrud->label('SIZE3', 'ขอบ');
$xcrud->label('product_model', 'รุ่น');
$xcrud->label('brand_id', 'ยี่ห้อ');
$xcrud->label('delete_flag', 'ยกเลิก');


$xcrud->pass_var('category_id',  1 , 'create');

 
$xcrud->pass_var('create_user',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');

@$xcrud->button($_SESSION['url'] . 'bills/bill_print2/{product_id}', 'สร้างรหัส', 'icon-check', '', array('target' => '_blank'));



echo $xcrud->render();
