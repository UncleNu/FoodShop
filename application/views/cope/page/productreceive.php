<!-- <a href="<?php echo BASE_URL; ?>products/frmReceive" class="btn btn-success">เพิ่มสินค้าด้วยบาร์โค๊ด</a> -->

<?php
 $xcrud->unset_remove();
$xcrud->unset_view();
$xcrud->unset_add();
$xcrud->table('tbl_product_receive_header');
$xcrud->table_name('รับสินค้าเข้า ');
$xcrud->where("IsDelete = 'N' ");
$xcrud->order_by("receive_header_id",'desc');
$xcrud->columns('receive_header_id ,receive_type_id,  doc_date, doc_ref,saler_id,receive_header_description, IsActive ,IsDelete ');
$xcrud->fields('receive_header_id ,receive_type_id, doc_date, doc_ref,saler_id,receive_header_description , IsActive ,IsDelete  ');
$xcrud->relation('saler_id','tbl_saler','saler_id','saler_name');
$xcrud->relation('receive_type_id','cnf_receive_type','receive_type_id','receive_type_name');
$xcrud->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$xcrud->change_type('IsDelete', 'select','',array('N' => 'ไม่ลบ','Y' => 'ลบ', ));
$xcrud->change_type('IsApprove', 'select','',array('N' => 'ยังไม่ยืนยัน','Y' => 'ยืนยันแล้ว', )); 
$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');
$xcrud->label('receive_header_id', 'ID');
$xcrud->label('doc_date', 'วันที่');
$xcrud->label('saler_id', 'ผู้ขาย');
$xcrud->label('receive_qty', 'จำนวน');
$xcrud->label('receive_header_description', 'คำอธิบาย'); 
$xcrud->label('IsActive', 'สถานะ');
$xcrud->label('IsApprove', 'ยืนยัน');
$xcrud->label('IsDelete', 'ลบ');
$xcrud->label('doc_ref', 'เลขที่อ้างอิง');
$xcrud->label('receive_type_id', 'ประเภทการรับ');

// ******************************************** nested_table *******************************
  
$nested = $xcrud->nested_table('nested','receive_header_id','tbl_product_receive','receive_header_id'); // nested table
$nested->unset_add();

$nested->table_name('รายการ ');
$nested->where("IsDelete = 'N' ");
$nested->columns('barcode,product_id,qty1,unit_id1,unit_price1 , SumPrice , exp_date ,wh_id    ,IsActive');
$nested->fields('qty1,unit_id1,unit_price1, exp_date , wh_id  ,IsActive,IsDelete ');

// $nested->subselect('SumPrice','SELECT  (qty1 * unit_price1 ) FROM tbl_product_receive WHERE receive_id = {receive_id}'); // insert as last column
// $nested->subselect('Paid','SELECT SUM(amount) FROM payments WHERE customerNumber = {customerNumber}'); // other table
// $xcrud->subselect('Profit','{Paid}-{creditLimit}'); // current table
$nested->subselect('SumPrice','{qty1}*{unit_price1}'); // current table
$nested->readonly('barcode');
$nested->relation('barcode','tbl_products','barcode','product_name' ," IsDelete = 'N' ");
$nested->relation('unit_id1','tbl_unit','unit_id','unit_name');
$nested->relation('wh_id','tbl_wh','wh_id','wh_name');

// $nested->relation('product_id','tbl_products','product_id','product_name');
$nested->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$nested->change_type('IsDelete', 'select','',array('Y' => 'ลบ','N' => 'ไม่ลบ', ));
$nested->change_type('IsComplete', 'select','',array('N' => 'ยังไม่จ่าย','Y' => 'จ่ายเงินแล้ว', ));
 
$nested->label('product_id', 'รายการ');
$nested->label('qty1', 'จำนวน');
$nested->label('unit_price1', 'ราคาต่อหน่วย');
$nested->label('SumPrice', 'รวมเป็นเงิน'); 
$nested->label('unit_id1', 'หน่วยนับ'); 
$nested->label('IsActive', 'สถานะ');
$nested->label('IsApprove', 'ยืนยัน');
$nested->label('IsDelete', 'ลบ');
$nested->label('wh_id', 'คลังเก็บ');
$nested->label('exp_date', 'หมดอายุ');

$nested->column_class('qty1,SumPrice,unit_price1', 'align-right');
$nested->change_type('SumPrice','price','0',array('prefix'=>'')); // number format
$nested->change_type('unit_price1','price','0',array('prefix'=>'')); // number format
$nested->sum('SumPrice'); // sum row(), receives data from full table (ignores pagination)

$nested->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$nested->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$nested->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$nested->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');

echo $xcrud->render();

?>