<?php

class cardvalue_model extends Model {

    function cardvalue($card_value , $card_type_id , $card_expire){
        // 1. ยกเลิกการ์ดเดิม Active = f
        $x_date = date("Y-m-d H:i:s");
        $x_user_id = $_SESSION['user_id'];
        $sql = "UPDATE tbl_cards_value 
            SET card_value = 0 
                ,IsActive = 'N' 
                ,IsDelete = 'R' 
                ,data_note = 'Reset'         
                ,update_user_id = $x_user_id 
                ,update_date = '$x_date'
         WHERE card_type_id =  '$card_type_id'
                AND IsDelete = 'N';  ";
                //   echo "<pre> $sql </pre> ";
        $this->execute($sql)  ;

        // 2. เอาการ์ดทั้งหมดใน type นี้ลง tb_card_value
        $sql = "INSERT INTO tbl_cards_value (card_expire , card_date, card_no,card_type_id,IsDelete,IsActive , card_value,create_user_id, create_date) 
                 SELECT  '$card_expire','$x_date', card_no,card_type_id,'N','Y','$card_value','$x_user_id','$x_date'   FROM tbl_cards WHERE card_type_id =  $card_type_id ;";
        // echo "<pre> $sql </pre> ";
         $this->execute($sql);
       

        // 3. update ข้อมูลการ์ด
        $sql = "UPDATE tbl_cards 
            SET card_value='$card_value' 
                ,update_user_id = $x_user_id 
                ,update_date = '$x_date'
            WHERE card_type_id = '$card_type_id' ;";
        // echo "<pre> $sql </pre> ";
        $this->execute($sql);

 


// list card value
$x_todate =  date("Y-m-d");
        $sql = "SELECT * FROM tbl_cards_value WHERE   card_type_id = '$card_type_id' AND IsActive = 'Y' AND isDelete = 'N'; ";
    // echo "<pre> $sql </pre> ";
        $res = $this->query($sql);
        // print_r ($res);
        return ($res);

    }





}

?>