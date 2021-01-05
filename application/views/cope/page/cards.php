<?php
$xcrud->table('tbl_cards');
$xcrud->table_name('ข้อมูลบัตร');
$xcrud->unset_view();
$xcrud->unset_remove();
// $xcrud->where("category_id = 1 ");
$xcrud->columns('card_id, card_no, card_value, card_type_id, card_note,IsActive,IsDelete');
$xcrud->fields('  card_no,card_value,  card_type_id, card_note,IsActive,IsDelete');

$xcrud->label('card_id', 'ID');
$xcrud->label('card_no', 'รหัสบัตร');
$xcrud->label('card_value', 'มูลค่าบัตร');
$xcrud->label('card_type_id', 'ประเภทบัตร');
$xcrud->label('card_note', 'หมายเหตุ');
$xcrud->change_type('IsActive', 'select','',array('Y' => 'Yes','N' => 'No', ));
$xcrud->change_type('IsDelete', 'select','',array('N' => 'No','Y' => 'Yes', ));
$xcrud->relation('card_type_id','tbl_cards_type','card_type_id','card_type_name');

$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');


// @$xcrud->button($_SESSION['url'] . 'bills/bill_print2/{card_no}', 'เติมเงิน', 'icon-check', '', array('target' => '_blank'));
// @$xcrud->button($_SESSION['url'] . 'bills/bill_print2/{card_no}', 'ข้อมูล', 'icon-check', '', array('target' => '_blank'));



echo $xcrud->render();
?>