<?php

$xcrud->unset_remove();
$xcrud->unset_view();
$xcrud->unset_add();
$xcrud->table('tbl_product_receive');
$xcrud->table_name('รับสินค้าเข้า ');
$xcrud->where("IsDelete = 'N' ");
$xcrud->columns('barcode,product_id,qty1,unit_id1,unit_price1 , SumPrice , exp_date ,wh_id    ,IsActive');
$xcrud->fields('qty1,unit_id1,unit_price1, exp_date , wh_id  ,IsActive');
$xcrud->readonly('barcode');

$xcrud->subselect('SumPrice','{qty1}*{unit_price1}'); // current table

$xcrud->relation('barcode','tbl_products','barcode','product_name' ," IsDelete = 'N' ");
$xcrud->relation('unit_id1','tbl_unit','unit_id','unit_name');
$xcrud->relation('wh_id','tbl_wh','wh_id','wh_name');

echo $xcrud->render();

?>