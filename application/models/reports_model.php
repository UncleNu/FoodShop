<?php
class reports_model extends Model
{
// รายงานการรับสินค้า
function rptReceive($d1,$d2,$saler_id){

    $xWhere = "";
    if ($d1 != ""){
        $xWhere .= " AND   tbl_product_receive.doc_date BETWEEN '$d1' AND '$d2' ";
    }
    if ($saler_id != "0"){
        $xWhere .= " AND tbl_product_receive_header.saler_id = $saler_id ";
    }
    $sql = "SELECT
                tbl_product_receive.doc_date,
                tbl_product_receive_header.saler_id,
                tbl_saler.saler_name,
                tbl_product_receive.product_id,
                tbl_products.product_name,
                tbl_product_receive.qty1,
                tbl_product_receive.unit_id1,
                tbl_product_receive.unit_price1,
                tbl_unit.unit_name,
                tbl_product_receive.wh_id,
                tbl_wh.wh_name,
                tbl_product_receive.exp_date,
                tbl_product_receive.IsApprove,
                tbl_product_receive.IsActive,
                tbl_product_receive.IsDelete ,
                cnf_receive_type.receive_type_name 
            FROM
                tbl_product_receive
                LEFT JOIN tbl_product_receive_header ON tbl_product_receive.receive_header_id = tbl_product_receive_header.receive_header_id
                LEFT JOIN tbl_saler ON tbl_product_receive_header.saler_id = tbl_saler.saler_id
                LEFT JOIN tbl_products ON tbl_product_receive.barcode = tbl_products.barcode
                LEFT JOIN tbl_unit ON tbl_product_receive.unit_id1 = tbl_unit.unit_id
                LEFT JOIN tbl_wh ON tbl_product_receive.wh_id = tbl_wh.wh_id
                LEFT JOIN cnf_receive_type ON tbl_product_receive_header.receive_type_id = cnf_receive_type.receive_type_id
            WHERE tbl_product_receive.IsActive = 'Y' AND tbl_product_receive.IsDelete='N'   $xWhere  
    ";
    // echo "<pre> $sql </pre> ";
     $res = $this->query($sql);
     return ($res);
}
// ---------------------------------------------------------------------------------------
// รายงานการขาย (ส่วนรายละเอียด)

function rptSaleDetail($d1,$d2) {
    $xWhere = "";
    if ($d1 != ""){
        $xWhere .= " AND    IsComplete_date BETWEEN '$d1' AND '$d2' ";
    }
     
$xWhere .= " AND product_type_id > 1 ";
    $sql = " 	SELECT tbl_products.product_id , tbl_products.product_name, tbl_products.unit_price , unit_cost
                    ,( SELECT COUNT(sale_qty) FROM tbl_sale_detail 
                            WHERE tbl_sale_detail.product_id = tbl_products.product_id 
                                AND tbl_sale_detail.IsActive='Y' AND tbl_sale_detail.IsDelete='N' 
                                AND tbl_sale_detail.IsComplete='Y' $xWhere
                            ) as CountProduct
                    ,( SELECT SUM(sale_qty * unit_price) FROM tbl_sale_detail 
                            WHERE tbl_sale_detail.product_id = tbl_products.product_id
                                AND tbl_sale_detail.IsActive='Y' AND tbl_sale_detail.IsDelete='N' 
                                AND tbl_sale_detail.IsComplete='Y' $xWhere
                             ) as PriceProduct
                    
                    FROM tbl_products
                    WHERE tbl_products.IsActive='Y' AND tbl_products.IsDelete='N'
    
    ";
        // echo "<pre> SQL :  $sql </pre> ";
      $res = $this->query($sql);
      return ($res);
}
//------------------------------------------
// ฝากขาย
function rptSale2Detail($d1,$d2) {
    $xWhere = "";
    if ($d1 != ""){
        $xWhere .= " AND    IsComplete_date BETWEEN '$d1' AND '$d2' ";
    }
     
 
    $sql = " 	SELECT tbl_products.product_id , tbl_products.product_name, tbl_products.unit_price , unit_cost
                    ,( SELECT COUNT(sale_qty) FROM tbl_sale_detail 
                            WHERE tbl_sale_detail.barcode = tbl_products.barcode 
                                AND tbl_sale_detail.IsActive='Y' AND tbl_sale_detail.IsDelete='N' 
                                AND tbl_sale_detail.IsComplete='Y' $xWhere
                            ) as CountProduct
                    ,( SELECT SUM(sale_qty * unit_price) FROM tbl_sale_detail 
                            WHERE tbl_sale_detail.barcode = tbl_products.barcode
                                AND tbl_sale_detail.IsActive='Y' AND tbl_sale_detail.IsDelete='N' 
                                AND tbl_sale_detail.IsComplete='Y' $xWhere
                             ) as PriceProduct
                    
                    FROM tbl_products
                    WHERE product_type_id = 1 AND  tbl_products.IsActive='Y' AND tbl_products.IsDelete='N'
    
    ";
    //    echo "<pre> SQL :  $sql </pre> ";
      $res = $this->query($sql);
      return ($res);
}


// ---------------------------------------------------------------------------------------
// รายงานการขาย 

function rptSale($d1,$d2) {
    $xWhere = "";
    if ($d1 != ""){
        $xWhere .= " AND    IsComplete_date BETWEEN '$d1' AND '$d2' ";
    }
    

    $sql = "SELECT
	tbl_sale_detail.runno,
	tbl_sale_detail.doc_date,
	tbl_sale_detail.bill_no,
	tbl_products.product_name,
	tbl_sale_detail.sale_qty,
	tbl_sale_detail.unit_price,
	tbl_sale_detail.product_type_id,
	tbl_product_type.product_type_name,
	tbl_products.unit_price AS price_system,	tbl_products.unit_cost AS price_cost,
	tbl_unit.unit_name ,
	tbl_sale_detail.create_user_id,
	cnf_user.user_name ,
    tbl_sale_detail.IsComplete_date
FROM
	tbl_sale_detail
	LEFT JOIN tbl_products ON tbl_sale_detail.product_id = tbl_products.product_id
	LEFT JOIN tbl_product_type ON tbl_sale_detail.product_type_id = tbl_product_type.product_type_id
	LEFT JOIN tbl_unit ON tbl_products.unit_id = tbl_unit.unit_id
    LEFT JOIN cnf_user ON tbl_sale_detail.create_user_id = cnf_user.user_id
WHERE tbl_products.IsActive='Y' AND tbl_products.IsDelete='N' AND tbl_sale_detail.IsComplete = 'Y'
        AND tbl_sale_detail.IsComplete_date BETWEEN '$d1' AND '$d2'  
Order by runno    
    ";
        // echo "<pre> $sql </pre> ";
      $res = $this->query($sql);
      return ($res);
}



// ---------------------------------------------------------------------------------------
// รายงานสต็อกคงเหลือ


function rptStockBalance() { 
    $sql = "SELECT barcode,
                    product_id, product_name  ,product_max , product_min
                    ,(SELECT SUM(qty1) FROM tbl_product_receive 
                            WHERE tbl_product_receive.barcode = tbl_products.barcode
                                        AND IsActive = 'Y' AND IsDelete = 'N'  
                    ) AS ReceiveProduct
                    ,( SELECT SUM(sale_qty) FROM tbl_sale_detail 
                            WHERE tbl_sale_detail.barcode = tbl_products.barcode 
                                        AND IsActive = 'Y' AND IsDelete = 'N' AND IsComplete = 'Y'
                    ) AS SaleProduct
            FROM tbl_products
            WHERE IsDelete = 'N' AND IsActive = 'Y' AND product_type_id not in (1)
    ";
    //   echo "<pre> $sql </pre> ";
      $res = $this->query($sql);
      return ($res);
}


// ---------------------------------------------------------------------------------------

function rptStockBalanceWH() { 
    $sql = "SELECT barcode,    product_id, product_name , product_max , product_min
                    ,(SELECT SUM(qty1) FROM tbl_product_receive 
                            WHERE tbl_product_receive.barcode = tbl_products.barcode
                                        AND IsActive = 'Y' AND IsDelete = 'N'  AND wh_id = 1
                    ) AS ReceiveProductWH1                    
                    ,(SELECT SUM(qty1) FROM tbl_product_receive 
                            WHERE tbl_product_receive.barcode = tbl_products.barcode
                                        AND IsActive = 'Y' AND IsDelete = 'N'  AND wh_id = 2
                    ) AS ReceiveProductWH2                    
                    ,(SELECT SUM(qty1) FROM tbl_product_receive 
                            WHERE tbl_product_receive.barcode = tbl_products.barcode
                                        AND IsActive = 'Y' AND IsDelete = 'N'  
                    ) AS ReceiveProduct                    
                    ,( SELECT SUM(sale_qty) FROM tbl_sale_detail 
                            WHERE tbl_sale_detail.barcode = tbl_products.barcode 
                                        AND IsActive = 'Y' AND IsDelete = 'N' AND IsComplete = 'Y' AND wh_id = 1
                    ) AS SaleProductWH1
                    ,( SELECT SUM(sale_qty) FROM tbl_sale_detail 
                            WHERE tbl_sale_detail.barcode = tbl_products.barcode 
                                        AND IsActive = 'Y' AND IsDelete = 'N' AND IsComplete = 'Y' AND wh_id = 2
                    ) AS SaleProductWH2                    
                    ,( SELECT SUM(sale_qty) FROM tbl_sale_detail 
                            WHERE tbl_sale_detail.barcode = tbl_products.barcode 
                                        AND IsActive = 'Y' AND IsDelete = 'N' AND IsComplete = 'Y'
                    ) AS SaleProduct
    FROM tbl_products
    WHERE IsDelete = 'N' AND IsActive = 'Y' AND product_type_id not in (1)
    ";
    //   echo "<pre> $sql </pre> ";
      $res = $this->query($sql);
      return ($res);
}


// ---------------------------------------------------------------------------------------
// รายงาน ตามประเภท
    function rptSaleByType($date1, $date2){
    $sql = " SELECT product_type_id, product_type_name
    ,( SELECT SUM( tbl_sale_detail.sale_qty * tbl_sale_detail.unit_price ) 
            FROM tbl_sale_detail 	
            WHERE tbl_sale_detail.product_type_id = tbl_product_type.product_type_id 
                        AND tbl_sale_detail.IsActive = 'Y' AND tbl_sale_detail.IsDelete = 'N' AND tbl_sale_detail.IsComplete = 'Y'
      			    	AND tbl_sale_detail.IsComplete_date BETWEEN  '$date1'  AND '$date2'
        ) AS Sum_price 
    FROM
        tbl_product_type 
    WHERE
        tbl_product_type.IsActive = 'Y' 
        AND tbl_product_type.IsDelete = 'N'";

// echo "<pre> $sql </pre> ";
    $res = $this->query($sql);
    return ($res);  
    }


// ---------------------------------------------------------------------------------------



    function SumStoreByBrand($date1, $date2)
    {

        $sql = " SELECT
                    cnf_barnd.brand_name,                    
                    SUM(tbl_withdraw_store.qty) as qty                     
                    FROM
                    tbl_withdraw_store
                    INNER JOIN tbl_withdraw_detail ON tbl_withdraw_store.wd_d_id = tbl_withdraw_detail.wd_d_id
                    INNER JOIN tbl_withdraw_header ON tbl_withdraw_detail.doc_no = tbl_withdraw_header.doc_no
                    INNER JOIN cnf_products ON tbl_withdraw_store.product_code = cnf_products.product_code
                    INNER JOIN cnf_barnd ON cnf_products.brand_id = cnf_barnd.brand_id
                    WHERE tbl_withdraw_header.doc_date BETWEEN '$date1' AND '$date2'
                    GROUP BY cnf_barnd.brand_name
                    ORDER BY cnf_barnd.brand_name  ";
        // echo "<pre> $sql </pre> ";
        $res = $this->query($sql);
        return ($res);
    }


    function SumStoreByProductCode($date1, $date2)
    {

        $sql = "SELECT
                    cnf_products.product_code,
                    cnf_products.product_name, 
                    SUM(tbl_withdraw_store.qty) as qty 
                    
                    FROM
                    tbl_withdraw_store
                    INNER JOIN tbl_withdraw_detail ON tbl_withdraw_store.wd_d_id = tbl_withdraw_detail.wd_d_id
                    INNER JOIN tbl_withdraw_header ON tbl_withdraw_detail.doc_no = tbl_withdraw_header.doc_no
                    INNER JOIN cnf_products ON tbl_withdraw_store.product_code = cnf_products.product_code
                    INNER JOIN cnf_barnd ON cnf_products.brand_id = cnf_barnd.brand_id
                    WHERE tbl_withdraw_header.doc_date BETWEEN '$date1' AND '$date2'
                    GROUP BY cnf_products.product_code
                    ORDER BY cnf_products.product_code
        
         ";
        // echo "<pre> $sql </pre> ";
        $res = $this->query($sql);
        return ($res);
    }

    function GroupStoreByMonth($xyear,$xmonth)
    {
        $sql = "SELECT
                    product_code,
                    DAY ( tbl_withdraw_header.doc_date ) AS bk_day,
                    COUNT( * ) AS numBook 
                FROM
                    `tbl_withdraw_detail`
                    LEFT JOIN tbl_withdraw_header ON tbl_withdraw_detail.doc_no = tbl_withdraw_header.doc_no 
                    WHERE  tbl_withdraw_header.doc_date  LIKE    '$xyear-$xmonth%'   
                GROUP BY
                    product_code,
                    DAY (  tbl_withdraw_header.doc_date  )";

        $res = $this->query($sql);
        return ($res);
    }
}