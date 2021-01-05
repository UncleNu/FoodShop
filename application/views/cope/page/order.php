<?php
 $xcrud->unset_remove();
$xcrud->table('tbl_order_header');
$xcrud->table_name('รายการขาย ');

$xcrud->columns('order_id, doc_date , doc_no ,shop_id, order_status, pay_type, card_no');
$xcrud->fields('order_id, doc_date , doc_no ,shop_id, order_status, pay_type, card_no');

 
// $xcrud->where('catid =', 5);
// $xcrud->where('created >', $last_visit);
$xcrud->order_by('order_id','desc');
$xcrud->relation('shop_id','tbl_shops','shop_id','shop_name');
// ******************************************** nested_table *******************************
$detail = $xcrud->nested_table('Order_Detail','doc_no','tbl_order_detail','doc_no'); // nested table
$detail->columns('   menu_id, qty , menu_price ,SumPrice ');
$detail->fields(' menu_id, qty , menu_price ,SumPrice ');
$detail->relation('menu_id','tbl_menus','menu_id','menu_name');
$detail->subselect('SumPrice','{menu_price}*{qty}');
echo $xcrud->render();
?>