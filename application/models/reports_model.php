<?php
class reports_model extends Model
{

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
