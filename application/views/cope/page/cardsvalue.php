<?php

$xcrud->table('tbl_cards_value');
$xcrud->order_by('data_id','desc');

$xcrud->table_name('ข้อมูลการเติมเงิน ');

$xcrud->columns('data_id, card_no , card_expire ,IsActive, create_user_id, create_date');
$xcrud->fields('data_id, card_no , card_expire ,IsActive, create_user_id, create_date');

$xcrud->relation('create_user_id','cnf_user','user_id','user_name');



echo $xcrud->render();

?>