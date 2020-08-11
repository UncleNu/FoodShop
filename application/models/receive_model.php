<?php
class receive_model extends Model
{
    function RcSumQTY($date1, $date2)
    {

    $sql = "SELECT SUM(qty1) as data_value
              FROM tbl_receive_product
              WHERE tbl_receive_product.doc_date BETWEEN '$date1' AND '$date2' 
                  AND tbl_receive_product.complete_flag = 'Y' 
                AND tbl_receive_product.delete_flag = 'N'  ";
        $rs = $this->query($sql);
        return ($rs);
    }


    function RcSumPrice($date1, $date2)
    {

    $sql = "SELECT SUM(qty1 * unit_price) as data_value
              FROM tbl_receive_product
              WHERE tbl_receive_product.doc_date BETWEEN '$date1' AND '$date2' 
                  AND tbl_receive_product.complete_flag = 'Y' 
                AND tbl_receive_product.delete_flag = 'N'  ";
        $rs = $this->query($sql);
        return ($rs);
    }



}
