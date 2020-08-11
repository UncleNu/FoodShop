<?php
$xcrud->table('cnf_user');
$xcrud->table_name('User ');
$xcrud->unset_view();
// $xcrud->where("category_id = 1 ");
$xcrud->columns('user_id, user_name, user_login , user_level , IsActive ,user_img');
$xcrud->fields(' user_id, user_name, user_login, user_level ,user_password , IsActive ,user_img');

$xcrud->change_type('user_password', 'password', 'md5', array('maxlength'=>10,'placeholder'=>'enter password'));
$xcrud->relation('user_level','userlevels','userlevelid','userlevelname');

$xcrud->label('user_id', 'ID');
$xcrud->label('user_name', 'ชื่อ-สกุล');
$xcrud->label('user_login', 'Login Name');
$xcrud->label('user_password', 'Password');
// $xcrud->change_type('IsActive', 'select','',array('Y' => 'Yes','N' => 'No', ));
// $xcrud->change_type('IsDelete', 'select','',array('N' => 'No','Y' => 'Yes', ));





$xcrud->change_type('user_img', 'image');
$xcrud->change_type('user_img', 'image', '', array('width' => 800, 'height' => 600));




$xcrud->pass_var('create_user_id',  $_SESSION['user_id']  , 'create');
$xcrud->pass_var('create_date',  date('Y-m-d H:i:s') , 'create');
$xcrud->pass_var('update_user_id',  $_SESSION['user_id']  , 'edit');
$xcrud->pass_var('update_date',    date('Y-m-d H:i:s') , 'edit');

 

echo $xcrud->render();
?>