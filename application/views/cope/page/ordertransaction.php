<?php
 $xcrud->unset_remove();
$xcrud->table('tbl_order_detail');
 
$xcrud->table_name('รายการขาย ');

$xcrud->columns('order_id,doc_no,doc_date,shop_id,menu_id,qty,menu_price  ');

// $xcrud->sum('sale_qty,unit_price');
// $xcrud->subselect('Sum','{sale_qty}*{unit_price} ');
$xcrud->fields('order_id,doc_no,doc_date,shop_id,menu_id,qty,menu_price  ');

$xcrud->relation('menu_id','tbl_menus','menu_id','menu_name');
$xcrud->relation('shop_id','tbl_shops','shop_id','shop_name');
// $xcrud->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
// $xcrud->change_type('IsComplete', 'select','',array('N' => 'ยังไม่จ่าย','Y' => 'จ่ายเงินแล้ว', ));
 

echo $xcrud->render();

?>