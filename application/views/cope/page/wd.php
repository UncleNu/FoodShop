<?php
//  $xcrud->unset_remove();
$xcrud->table('tbl_sale_header');
$xcrud->table_name('เบิกสินค้า ');
// $xcrud->unset_view();

if ($_SESSION['user_level'] == -1) {  
    $xcrud->columns('runno, bill_no,  station_code,doc_date, sum_price,discount, IsActive,IsComplete ');
    $xcrud->fields('bill_no, station_code,doc_date,member_id,sum_price,discount, IsActive,IsComplete ,IsDelete ');
} else if ($_SESSION['user_level'] == 1) {
    $xcrud->unset_remove();
    $xcrud->where("IsDelete = 'N' ");
    $xcrud->columns('runno, bill_no,  station_code,doc_date, sum_price,discount, IsActive,IsComplete ');
    $xcrud->fields('bill_no, station_code,doc_date,member_id,sum_price,discount, IsActive,IsComplete ,IsDelete ');
 
} else if ($_SESSION['user_level'] == 2) {
    $xcrud->unset_remove();
    $xcrud->where("IsDelete = 'N' ");
    $xcrud->columns('runno, bill_no,  station_code,doc_date, sum_price,discount, IsActive,IsComplete ');
    $xcrud->fields('bill_no, station_code,doc_date,member_id,sum_price,discount, IsActive,IsComplete  ');
}

else {
    $xcrud->unset_remove();
    $xcrud->where("IsDelete = 'N' ");
    $xcrud->columns('runno, bill_no,  station_code,doc_date, sum_price,discount, IsActive,IsComplete ');
    $xcrud->fields('bill_no, station_code,doc_date,member_id,sum_price,discount, IsActive,IsComplete  ');
}




$xcrud->order_by("runno",'desc'); 
// $xcrud->columns('runno, bill_no,  station_code,doc_date, sum_price,discount, IsActive,IsComplete ');
// $xcrud->fields('bill_no, station_code,doc_date,member_id,sum_price,discount, IsActive,IsComplete ,IsDelete ');
$xcrud->relation('member_id','tbl_members','member_id','member_name');
$xcrud->relation('wd_type_id','cnf_wd_type','wd_type_id','wd_type_name');

$xcrud->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$xcrud->change_type('IsComplete', 'select','',array('N' => 'ไม่สมบูรณ์','Y' => 'สมบูรณ์', ));
 
$xcrud->label('runno', 'ลำดับ');
$xcrud->label('doc_date', 'วันที่'); 
$xcrud->label('bill_no', 'เลขที่บิล'); 
$xcrud->label('wd_type_id', 'ประเภทการเบิก'); 
$xcrud->label('station_code', 'เครื่อง'); 
$xcrud->label('sum_price', 'รวมเป็นเงิน'); 
$xcrud->label('discount', 'ส่วนลด'); 
$xcrud->label('IsComplete', 'สมบูรณ์'); 



$xcrud->label('IsActive', 'สถานะ');
$xcrud->label('IsDelete', 'ลบรายการ');


$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');

// ******************************************** nested_table *******************************

$nested = $xcrud->nested_table('nested','bill_no','tbl_sale_detail','bill_no'); // nested table
$nested->table_name('รายการ ');

$nested->columns('sale_id,bill_no,product_id,sale_qty,unit_price   ,IsActive,IsComplete');

$nested->sum('sale_qty,unit_price');
$nested->subselect('Sum','{sale_qty}*{unit_price} ');
$nested->fields('sale_id,bill_no,product_id,sale_qty,unit_price, IsActive,IsComplete,IsDelete');

$nested->relation('product_id','tbl_products','product_id','product_name');
$nested->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$nested->change_type('IsComplete', 'select','',array('N' => 'ยังไม่จ่าย','Y' => 'จ่ายเงินแล้ว', ));
 
echo $xcrud->render();
?>