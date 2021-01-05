<a href="<?php echo BASE_URL; ?>sendbalance" class="btn btn-success">เพิ่มการส่งยอด</a>
<?php
$xcrud->table('tbl_send_balance');
$xcrud->table_name('ส่งยอด ');
$xcrud->order_by('sand_id','desc');
$xcrud->unset_view();
$xcrud->unset_add();
$xcrud->unset_remove();
if ($_SESSION['user_level'] == -1) {  
    $xcrud->fields('d1,d2,sum_price,send_money,send_comment , IsActive ,IsDelete '); 
    $xcrud->columns('d1,d2,sum_price,send_money,send_comment , IsActive ,IsDelete  ');
} else if ($_SESSION['user_level'] == 1) {
    $xcrud->unset_remove();
    $xcrud->where("IsDelete = 'N' ");
    $xcrud->fields('d1,d2,sum_price,send_money,send_comment , IsActive ,IsDelete   '); 
    $xcrud->columns('d1,d2,sum_price,send_money,send_comment, IsActive ,IsDelete   ');
} else {
    $xcrud->unset_remove();
    $xcrud->where("IsDelete = 'N' ");
    $xcrud->fields('d1,d2,sum_price,send_money,send_comment, IsActive  '); 
    $xcrud->columns('d1,d2,sum_price,send_money,send_comment , IsActive  ');
}
// @$xcrud->button(BASE_URL . 'sendbalance/sendbalance_print/{sand_id}', 'พิมพ์', 'icon-check', '', array('target' => '_blank'));
@$xcrud->button(BASE_URL . 'sendbalance/sendbalance_print/{sand_id}', 'พิมพ์', 'icon-check', '');


$xcrud->label('d1', 'จากวันที่');
$xcrud->label('d2', 'ถึงวันที่');
$xcrud->label('sum_price', 'ยอดขาย'); 
$xcrud->label('send_money', 'ยอดส่ง'); 
$xcrud->label('send_comment', 'หมายเหตุ'); 
$xcrud->label('IsActive', 'สถานะ');
$xcrud->label('IsDelete', 'ลบรายการ');
$xcrud->change_type('IsActive', 'select','',array('Y' => 'ใช้งาน','N' => 'ระงับ', ));
$xcrud->change_type('IsDelete', 'select','',array('N' => 'ไม่ลบ','Y' => 'ลบ', ));
$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');



echo $xcrud->render();
?>