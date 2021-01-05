<?php
 $xcrud->unset_remove();
$xcrud->table('cnf_shop_type');
$xcrud->table_name('ประเภทร้านค้า ');
// $xcrud->where('catid =', 5);
// $xcrud->where('created >', $last_visit);
$xcrud->columns('shop_type_name, IsActive ');
$xcrud->fields('shop_type_name, IsActive,IsDelete ');


$xcrud->label('shop_type_name', 'ชื่อ');
$xcrud->label('IsActive', 'Active');
$xcrud->label('IsDelete', 'Delete');

$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');




echo $xcrud->render();
?>