<a href="<?php echo BASE_URL; ?>cardvalue/frm1/1" class="btn btn-success"> <i class="fas fa-hand-holding-usd"></i> เติมเงินบัตรพนักงานประจำ</a>
<a href="<?php echo BASE_URL; ?>cardvalue/frm1/2" class="btn btn-success">เติมเงินบัตรพนักงานชั่วคราว</a>
<a href="<?php echo BASE_URL; ?>cardvalue/frm2/3" class="btn btn-success">เติมเงินบัตรลูกค้าทั่วไป</a>

<?php

$xcrud->table('tbl_cards_value');
$xcrud->order_by('data_id','desc');

$xcrud->table_name('ข้อมูลการเติมเงิน ');

 $xcrud->columns('data_id, card_no , card_value, card_expire ,card_type_id,  IsActive,  create_date,data_note');
$xcrud->fields('  card_no ,card_value, card_expire ,card_type_id ,IsActive, create_user_id, create_date ,update_user_id, update_date,data_note');
$xcrud->relation('card_type_id','tbl_cards_type','card_type_id','card_type_name');

//  $xcrud->relation('create_user_id','cnf_user','user_id','user_name');

$xcrud->pass_var('IsActive',  'Y' , 'create');
$xcrud->pass_var('IsDelete',  'N' , 'create');


 $xcrud->pass_var('create_user_id',  @$_SESSION['user_id']  , 'create');
 $xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
 $xcrud->pass_var('update_user_id',  @$_SESSION['user_id']  , 'edit');
 $xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');

echo $xcrud->render();

?>