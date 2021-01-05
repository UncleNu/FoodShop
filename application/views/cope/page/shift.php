<?php
 $xcrud->unset_remove();

$xcrud->table('tbl_shift');
$xcrud->table_name('ข้อมูลกะ ');
$xcrud->unset_view();
$xcrud->order_by("shift_id",'desc'); 

if ($_SESSION['user_level'] == -1) {  
    $xcrud->fields('shift_id,station_name,shift_date, shift_open, cash_in, shift_close , cash_out , IsActive ,IsDelete '); 
    $xcrud->columns('shift_id,station_name,shift_date, shift_open, cash_in, shift_close , cash_out, IsActive ,IsDelete  ');
} else if ($_SESSION['user_level'] == 1) {
    $xcrud->unset_remove();
    $xcrud->where("IsDelete = 'N' ");
    $xcrud->fields('shift_id,station_name,shift_date, shift_open, cash_in, shift_close , cash_out , IsActive ,IsDelete   '); 
    $xcrud->columns('shift_id,station_name,shift_date, shift_open, cash_in, shift_close , cash_out, IsActive ,IsDelete   ');
} else {
    $xcrud->unset_remove();
    $xcrud->where("IsDelete = 'N' ");
    $xcrud->fields('shift_id,station_name,shift_date, shift_open, cash_in, shift_close , cash_out , IsActive  '); 
    $xcrud->columns('shift_id,station_name,shift_date, shift_open, cash_in, shift_close , cash_out , IsActive  ');
}

$xcrud->label('shift_id', 'ลำดับ');
$xcrud->label('station_name', 'เครื่อง'); 
$xcrud->label('shift_date', 'วันที่'); 
$xcrud->label('shift_open', 'เปิด'); 
$xcrud->label('cash_in', 'เงินต้น'); 
$xcrud->label('shift_close', 'ปิด'); 
$xcrud->label('cash_out', 'เงินส่ง'); 
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