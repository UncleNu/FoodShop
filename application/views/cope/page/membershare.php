<?php

$xcrud->table('tbl_share_header');
$xcrud->table_name('ข้อมูลหุ้น ');
$xcrud->unset_remove();

$xcrud->columns('share_id, share_year,   share_rate,  IsActive , IsDelete ');
$xcrud->fields('  share_year,   share_rate,   IsActive  ');
$xcrud->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$xcrud->change_type('IsDelete', 'select','',array('N' => 'No','Y' => 'Yes', ));
 
$xcrud->label('share_id', 'ID');
$xcrud->label('share_year', 'ปี');
$xcrud->label('share_rate', 'อัตราค่าหุ้น(บาท/หุ้น)');
$xcrud->label('IsActive', 'สถานะ');
$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');

$xcrud->column_class('share_year, share_rate', 'align-center');

// ******************************************** nested_table *******************************
 
$share_detail = $xcrud->nested_table('share_detail','share_id','tbl_share_detail','share_id'); // nested table
$share_detail->table_name('ขั้นต่ำ ขั้นสูง และค่าสมาชิก ');
$share_detail->unset_view();

$share_detail->columns('member_type_id, share_min, share_max, share_fee,   IsActive  ');
$share_detail->fields('member_type_id,share_min, share_max, share_fee,   IsActive ');
 
$share_detail->relation('member_type_id','tbl_member_type','member_type_id','member_type_name');

$share_detail->label('member_type_id', 'ประเภทสมาชิก');
$share_detail->label('share_min', 'จำนวนหุ้นขั้นต่ำ(หุ้น)');
$share_detail->label('share_max', 'จำนวนหุ้นขั้นสูง(หุ้น)');
$share_detail->label('share_fee', 'ราคาค่าสมัคร(บาท/คน)');
$share_detail->label('IsActive', 'สถานะ');

$share_detail->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$share_detail->change_type('IsDelete', 'select','',array('N' => 'No','Y' => 'Yes', ));
$share_detail->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$share_detail->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$share_detail->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$share_detail->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');


$share_detail->column_class(' share_min, share_max, share_fee', 'align-center');
// ******************************************** nested_table *******************************
$dividend = $xcrud->nested_table('dividend','share_id','tbl_share_dividend','share_id'); // nested table
$dividend->table_name('อัตราปันผลสมาชิก');
$dividend->unset_view();

$dividend->columns('dividend_average, dividend, dividend_comment,    IsActive  ');
$dividend->fields('dividend_average, dividend, dividend_comment,    IsActive ');
 
$dividend->label('dividend_average', 'อัตราปันผลเฉลี่ยคืน (%) ');
$dividend->label('dividend', 'อัตราปันผลหุ้น (%)');
$dividend->label('dividend_comment', 'หมายเหตุ');
$dividend->label('IsActive', 'สถานะ');

$dividend->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$dividend->change_type('IsDelete', 'select','',array('N' => 'No','Y' => 'Yes', ));
 
$dividend->column_class('dividend_average, dividend', 'align-center');



$dividend->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$dividend->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$dividend->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$dividend->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');


echo $xcrud->render();

?>