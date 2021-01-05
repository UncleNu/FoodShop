<?php
 $xcrud->unset_remove();
$xcrud->table('tbl_sale_detail');
$xcrud->order_by("runno",'desc'); 
$xcrud->table_name('รายการขาย - เบิก');

$xcrud->columns('runno, bill_no,product_id,sale_qty,unit_price, SumPrice, wh_id     ,IsComplete');
$xcrud->fields('wd_type_id, bill_no,product_id,sale_qty,unit_price,wh_id, IsActive,IsDelete,IsComplete');
$xcrud->subselect('SumPrice','{sale_qty}*{unit_price}'); // current table

$xcrud->relation('wd_type_id','cnf_wd_type','wd_type_id','wd_type_name');
$xcrud->relation('wd_type_id','cnf_wd_type','wd_type_id','wd_type_name');
$xcrud->relation('wh_id','tbl_wh','wh_id','wh_name');

$xcrud->sum('sale_qty,unit_price');
$xcrud->subselect('Sum','{sale_qty}*{unit_price} ');

$xcrud->relation('product_id','tbl_products','product_id','product_name');
$xcrud->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$xcrud->change_type('IsComplete', 'select','',array('Y' => 'จ่ายแล้ว','N' => 'ยังไม่จ่าย', ));
$xcrud->change_type('IsDelete', 'select','',array('N' => 'ไม่ลบ','Y' => 'ลบ', ));
 
$xcrud->label('runno', 'ลำดับ');
$xcrud->label('doc_date', 'วันที่'); 
$xcrud->label('bill_no', 'เลขที่บิล'); 
$xcrud->label('wd_type_id', 'ประเภทการเบิก'); 
$xcrud->label('station_code', 'เครื่อง'); 
$xcrud->label('sum_price', 'รวมเป็นเงิน'); 
$xcrud->label('discount', 'ส่วนลด'); 
$xcrud->label('IsComplete', 'จ่ายเงิน'); 
$xcrud->label('IsActive', 'สถานะ');
$xcrud->label('IsDelete', 'ลบรายการ');


$xcrud->label('sale_qty', 'จำนวน');
$xcrud->label('unit_price', 'ราคาต่อหน่วย');
$xcrud->label('SumPrice', 'รวมเป็นเงิน');
$xcrud->label('wh_id', 'คลังเก็บ');
$xcrud->label('product_id', 'สินค้า');

$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');

$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');

echo $xcrud->render();

?>