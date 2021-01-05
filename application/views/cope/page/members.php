<?php
 $xcrud->unset_remove();
$xcrud->table('tbl_members');
$xcrud->table_name('สมาชิก ');
$xcrud->where("IsDelete = 'N' ");
$xcrud->columns('member_id , member_type_id, member_code,member_name, member_description, member_card , IsActive ');
$xcrud->fields('member_type_id, member_code , member_name, member_description, member_card , IsActive ');

$xcrud->relation('member_type_id','tbl_member_type','member_type_id','member_type_name');

// $xcrud->change_type('member_type_id,', 'select','',array('1' => 'พนักงานประจำ','2' => 'พนักงานชั่วคราว', ));
$xcrud->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$xcrud->change_type('IsDelete', 'select','',array('N' => 'No','Y' => 'Yes', ));
 
$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');

$xcrud->label('member_id', 'ID');
$xcrud->label('member_code', 'รหัสพนักงาน');

$xcrud->label('member_name', 'ชื่อสมาขิก');
$xcrud->label('member_description', 'คำอธิบาย');
$xcrud->label('member_type_id', 'ประเภทสมาชิก');
$xcrud->label('member_card', 'รหัสบัตร');
 
$xcrud->label('IsActive', 'สถานะ');

echo $xcrud->render();
?>