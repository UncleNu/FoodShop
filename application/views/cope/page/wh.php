<?php
$xcrud->table('tbl_wh');
$xcrud->table_name('คลังเก็บสินค้า ');

$xcrud->unset_view();

if ($_SESSION['user_level'] == -1) {  
    $xcrud->fields('wh_name , IsActive ,IsDelete '); 
    $xcrud->columns('wh_id,wh_name , IsActive ,IsDelete  ');
} else if ($_SESSION['user_level'] == 1) {
    $xcrud->unset_remove();
    $xcrud->where("IsDelete = 'N' ");
    $xcrud->fields('wh_name , IsActive ,IsDelete   '); 
    $xcrud->columns('wh_id,wh_name , IsActive ,IsDelete   ');
} else {
    $xcrud->unset_remove();
    $xcrud->where("IsDelete = 'N' ");
    $xcrud->fields('wh_name , IsActive  '); 
    $xcrud->columns('wh_id,wh_name , IsActive  ');
}


$xcrud->label('wh_id', 'ลำดับ');
$xcrud->label('wh_name', 'ชื่อคลังเก็บ'); 
$xcrud->label('IsActive', 'สถานะ');
$xcrud->label('IsDelete', 'ลบรายการ');
$xcrud->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$xcrud->change_type('IsDelete', 'select','',array('N' => 'ไม่ลบ','Y' => 'ลบ', ));
$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');



echo $xcrud->render();
?>