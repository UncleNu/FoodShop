<?php
class sale_model extends Model {

    function sale_detail($d1,$d2){

    }

    function sum_sale($barcode){
        $sql = "SELECT SUM(sale_qty * unit_price) as data_value
        FROM tbl_sale_detail
        WHERE barcode = '$barcode'
            AND tbl_sale_detail.IsComplete = 'Y' 
          AND tbl_sale_detail.IsDelete = 'N'  ";
  $rs = $this->query($sql);
  return ($rs);
    }


}


?>