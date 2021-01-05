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

    function RcInsert()
    {
        $barcode = $_POST["barcode"];
        $sale_qty = $_POST["sale_qty"];
        $qty2 = $_POST["qty2"];
        $qty1 = $qty2 + $sale_qty;
        $create_user_id = $_SESSION["user_id"] ;
        $create_date =  date("Y-m-d h:i:s");
        $doc_date =  date("Y-m-d");

        $sql = " INSERT INTO tbl_product_receive (
            receive_header_id, doc_date,barcode,qty1,qty2,receive_description,IsApprove,IsActive,IsDelete,
            create_user_id,create_date , wh_id
        ) VALUES(
            1,'$doc_date','$barcode','$qty1','$qty2','In=$qty2 out=$sale_qty','Y','Y','N',
            '$create_user_id'  ,'$create_date'  ,'1'

        ) ";
// echo "<pre> $sql </pre>";
            $rs = $this->query($sql);

// update data


$sql = "
UPDATE tbl_product_receive SET 
    product_id = (SELECT product_id FROM tbl_products WHERE tbl_products.barcode = tbl_product_receive.barcode AND IsActive = 'Y' AND IsDelete='N') 
,   unit_price1 = (SELECT unit_cost FROM tbl_products WHERE tbl_products.barcode = tbl_product_receive.barcode AND IsActive = 'Y' AND IsDelete='N')
,   unit_id1 = (SELECT unit_id FROM tbl_products WHERE tbl_products.barcode = tbl_product_receive.barcode AND IsActive = 'Y' AND IsDelete='N')
WHERE tbl_product_receive.barcode = '$barcode'
";
$rs = $this->query($sql);
            return ($rs);


    }

function RcToday($barcode){
    $doc_date =  date("Y-m-d");
    $sql = " SELECT * FROM tbl_product_receive 
                INNER JOIN cnf_user ON cnf_user.user_id = tbl_product_receive.create_user_id
                WHERE doc_date = '$doc_date' AND barcode = '$barcode' ";
    $rs = $this->query($sql);
    return ($rs);


}



}