<?php
 $xcrud->unset_remove();
$xcrud->table('tbl_products');
$xcrud->table_name('รายการสินค้า ');
$xcrud->where("IsDelete = 'N' ");
$xcrud->order_by("product_id",'desc'); 
$xcrud->columns('product_id,product_type_id,  barcode ,  product_name, unit_cost, unit_price, unit_id , product_max, product_min , IsActive ');
$xcrud->fields('product_type_id,barcode ,  product_name,unit_cost, unit_price, unit_id , product_max, product_min , IsActive ,IsDelete ');

$xcrud->field_tooltip('product_name','กรุณากรอกชื่อสินค้า');
$xcrud->field_tooltip('barcode','กรุณากรอกบาร์โค๊ด');
$xcrud->search_columns('product_name,barcode,unit_price, unit_cost , product_type_id','product_name');

$xcrud->relation('product_type_id','tbl_product_type','product_type_id','product_type_name');
$xcrud->relation('unit_id', 'tbl_unit', 'unit_id', 'unit_name');

$xcrud->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$xcrud->change_type('IsDelete', 'select','',array('N' => 'ไม่ลบ','Y' => 'ลบ', ));
$xcrud->change_type('product_image', 'image'); 
$xcrud->change_type('product_image', 'image', '', array('width' => 800, 'height' => 600));

$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');

$xcrud->label('product_id', 'ID');
$xcrud->label('product_image', 'รูปภาพ');
$xcrud->label('product_code', 'รหัสสินค้า');
$xcrud->label('product_name', 'ชื่อสินค้า');
$xcrud->label('unit_price', 'ราคาขาย');
$xcrud->label('unit_cost', 'ราคาทุน');
$xcrud->label('unit_id', 'หน่วยนับ');
$xcrud->label('product_type_id', 'ประเภท');
$xcrud->label('IsActive', 'สถานะ');
$xcrud->label('IsDelete', 'ลบ');
$xcrud->label('product_max', 'MAX');
$xcrud->label('product_min', 'MIN');

echo $xcrud->render();
?>