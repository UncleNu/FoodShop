<?php
$xcrud->table('tbl_unit');
$xcrud->table_name('หน่วยนับ ');
$xcrud->unset_remove();
$xcrud->unset_view();

if ($_SESSION['user_level'] == -1) {  
    $xcrud->fields('unit_name , IsActive ,IsDelete '); 
    $xcrud->columns('unit_id,unit_name , IsActive ,IsDelete  ');
} else if ($_SESSION['user_level'] == 1) {
    $xcrud->unset_remove();
    $xcrud->where("IsDelete = 'N' ");
    $xcrud->fields('unit_name , IsActive ,IsDelete   '); 
    $xcrud->columns('unit_id,unit_name , IsActive ,IsDelete   ');
} else {
    $xcrud->unset_remove();
    $xcrud->where("IsDelete = 'N' ");
    $xcrud->fields('unit_name , IsActive  '); 
    $xcrud->columns('unit_id,unit_name , IsActive  ');
}


$xcrud->label('unit_id', 'ID');
$xcrud->label('unit_name', 'หน่วยนับ'); 
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