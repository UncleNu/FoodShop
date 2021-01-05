<?php

class sendbalance_model extends Model {
    function call_sale_price() {
        $xDD1 = $_POST["d1"];
        $xDD2 = $_POST["d2"];
        $xTT1 = $_POST["t1"];
        $xTT2 = $_POST["t2"];
        $xd1 = $xDD1 . " " . $xTT1;
        $xd2 = $xDD2 . " " . $xTT2;

        $sql = "SELECT * from tbl_sale_detail
            WHERE IsComplete_date BETWEEN '$xd1' AND '$xd2'      
            AND isDelete = 'N' AND isComplete = 'Y'  
        ";
         //echo "<pre> $sql </pre>";
            $res = $this->query($sql);
            return ($res);
    }
// -----------------------------------------------------------------------------
    function sum_emp_sale($xd1, $xd2){
        // $xDD1 = $_POST["d1"];
        // $xDD2 = $_POST["d2"];
        // $xTT1 = $_POST["t1"];
        // $xTT2 = $_POST["t2"];
        // $xd1 = $xDD1 . " " . $xTT1;
        // $xd2 = $xDD2 . " " . $xTT2;

        $sql = "SELECT user_id , user_login, user_name
                ,(
                    SELECT SUM(sale_qty * unit_price) 
                    FROM tbl_sale_detail 
                    WHERE IsComplete = 'Y' AND tbl_sale_detail.create_user_id = cnf_user.user_id
                        AND IsComplete_date BETWEEN '$xd1' AND '$xd2'   
                ) AS SUM_Sale
                FROM cnf_user WHERE user_level = 4 AND IsDelete = 0


        ";
        //  echo "<pre> $sql </pre>";
            $res = $this->query($sql);
            return ($res);
    }

// -----------------------------------------------------------------------------

function sum_station_sale($xd1, $xd2){

        $sql = "SELECT * 
                ,(
                    SELECT SUM(sale_qty * unit_price) 
                    FROM tbl_sale_detail 
                    LEFT JOIN tbl_sale_header ON tbl_sale_header.bill_no = tbl_sale_detail.bill_no
                    WHERE tbl_sale_detail.IsComplete = 'Y' 
                        AND tbl_sale_header.station_code = cnf_station.station_code
                        AND IsComplete_date BETWEEN '$xd1' AND '$xd2'  
                ) AS SUM_Staion
                FROM cnf_station";
        //  echo "<pre> $sql </pre>";

    $res = $this->query($sql);
    return ($res);
}



// -----------------------------------------------------------------------------

function sum_type_sale($xd1, $xd2){
        $sql = "SELECT * 
        ,(	SELECT SUM(sale_qty * unit_price) 
            FROM tbl_sale_detail 
            WHERE IsComplete = 'Y' 
                AND tbl_sale_detail.product_type_id = tbl_product_type.product_type_id
                AND IsComplete_date BETWEEN '$xd1' AND '$xd2'  
        ) AS SUM_Type
        FROM tbl_product_type";
// echo "<pre> $sql </pre>";
        $res = $this->query($sql);
        return ($res);

}

// -----------------------------------------------------------------------------




function insert_data() {

    
        $xd1 = $_POST["d1"];
        $xd2 = $_POST["d2"];
        $xsumprice  = $_POST["sum_price"];
        $xsendmoney = $_POST["send_money"];
        $xcomment = $_POST["send_comment"];
            $create_user_id = $_SESSION["user_id"] ;
            $create_date =  date("Y-m-d h:i:s");
            $sql = "INSERT INTO tbl_send_balance (d1,d2,sum_price,send_money , send_comment,create_user_id,create_date )
            VALUES ('$xd1','$xd2','$xsumprice','$xsendmoney','$xcomment','$create_user_id','$create_date') 
           ";
           echo "<pre> $sql </pre>";
           $res = $this->query($sql);
           return ($res);       
}

function call_data($id) {

$sql = " SELECT * FROM tbl_send_balance WHERE sand_id = $id ";
 //echo "<pre> $sql </pre> ";
    $res = $this->query($sql);
    return ($res);

}




}

?>