<?php
        $xcrud->unset_view();
        $xcrud->unset_add();
        if ($_SESSION['user_level'] == -1) { 

        } else{
        $xcrud->unset_edit();  
        $xcrud->unset_remove();
        }



        $xcrud->table('cnf_percent');
        $xcrud->table_name('เปอร์เซ็นต์การขาย ');

        $xcrud->label('percent_name', 'เรื่อง');
        $xcrud->label('percent_shop', 'โรงพยาบาล'); 
        $xcrud->label('percent_owner', 'เจ้าของ');
        $xcrud->label('percent_comment', 'หมายเหตุ');




        echo $xcrud->render();


?>