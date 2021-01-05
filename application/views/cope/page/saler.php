<?php

$xcrud->table('tbl_saler');
$xcrud->table_name('ผู้ขาย/ร้านค้า ');
$xcrud->unset_view();
$xcrud->unset_remove();
if ($_SESSION['user_level'] == -1) {  
    $xcrud->fields('saler_id,saler_name, saler_type, saler_description , IsActive ,IsDelete '); 
    $xcrud->columns('saler_name, saler_type, saler_description , IsActive ,IsDelete  ');
} else if ($_SESSION['user_level'] == 1) {
    $xcrud->unset_remove();
    $xcrud->where("IsDelete = 'N' ");
    $xcrud->fields('saler_name, saler_type, saler_description , IsActive ,IsDelete   '); 
    $xcrud->columns('saler_name, saler_type, saler_description, IsActive ,IsDelete   ');
} else {
    $xcrud->unset_remove();
    $xcrud->where("IsDelete = 'N' ");
    $xcrud->fields('saler_name, saler_type, saler_description , IsActive  '); 
    $xcrud->columns('saler_name, saler_type, saler_description , IsActive  ');
}

$xcrud->label('saler_id', 'ลำดับ');
$xcrud->label('saler_name', 'ชื่อผู้ขาย/ร้านค้า'); 
$xcrud->label('saler_description', 'หมายเหตุ'); 
$xcrud->label('saler_type', 'ประเภท'); 
$xcrud->label('IsActive', 'สถานะ');
$xcrud->label('IsDelete', 'ลบรายการ');
$xcrud->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$xcrud->change_type('IsDelete', 'select','',array('N' => 'ไม่ลบ','Y' => 'ลบ', ));
$xcrud->change_type('saler_type', 'select','',array('A' => 'ร้านค้าทั่วไป','B' => 'ฝากขาย', ));
$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');



echo $xcrud->render();
?>