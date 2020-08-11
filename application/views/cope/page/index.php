<?php
$xcrud->unset_csv();
$xcrud->table('useradmin');
$xcrud->table_name('ผู้ดูแลเว็บไชต์');
$xcrud->columns('username');
echo $xcrud->render();
?>