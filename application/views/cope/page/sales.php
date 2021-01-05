<?php
$xcrud->table('tbl_sale_header');
$xcrud->table_name('รายงานการขาย ');
$xcrud->unset_remove();
// $xcrud->unset_view();
$xcrud->order_by("runno",'desc'); 
$xcrud->columns('runno, bill_no,station_code,doc_date,member_id,sum_price,discount, IsActive,IsComplete ');
$xcrud->fields('bill_no,station_code,doc_date,member_id,sum_price,discount, IsActive,IsComplete ');
$xcrud->relation('member_id','tbl_members','member_id','member_name');

$xcrud->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$xcrud->change_type('IsComplete', 'select','',array('N' => 'ยังไม่จ่าย','Y' => 'จ่ายเงินแล้ว', ));
 
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
$nested->fields('sale_id,bill_no,product_id,sale_qty,unit_price, IsActive,IsComplete');

$nested->relation('product_id','tbl_products','product_id','product_name');
$nested->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$nested->change_type('IsComplete', 'select','',array('N' => 'ยังไม่จ่าย','Y' => 'จ่ายเงินแล้ว', ));
 








echo $xcrud->render();
?>