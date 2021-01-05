<?php
class dashboard_model extends Model {


function SaleToday($date1){
    $sql = "SELECT   SUM(sum_price - discount) as sum_price  from tbl_sale_header ";  
    $sql .= " WHERE doc_date = '$date1' ";
    $sql .= " AND tbl_sale_header.IsActive = 'Y' AND tbl_sale_header.IsDelete = 'N' 
              AND tbl_sale_header.IsComplete = 'Y'  ";
    $sql .= "  ";
    // echo "<pre> $sql </pre> ";
    $rs = $this->query($sql);
    return ($rs);
   
}

function SaleMonth($mm){
    $sql = "SELECT   SUM(sum_price - discount) as sum_price  from tbl_sale_header ";  
    $sql .= " WHERE MONTH(doc_date) = '$mm' ";
    $sql .= " AND tbl_sale_header.IsActive = 'Y' AND tbl_sale_header.IsDelete = 'N' 
              AND tbl_sale_header.IsComplete = 'Y'  ";
    $sql .= "  ";
    // echo "<pre> $sql </pre> ";
    $rs = $this->query($sql);
    return ($rs);
   
}

function CountMember(){
    $sql = "SELECT   COUNT(member_id) as count_member  from tbl_members ";  
    $sql .= " WHERE tbl_members.IsActive = 'Y' AND tbl_members.IsDelete = 'N'   ";
    $rs = $this->query($sql);
    return ($rs);
}




    function SaleTopDay($date1 )
    {
        $sql = "SELECT product_name, sum(sale_qty) AS sum_qty FROM tbl_sale_detail ";
        $sql .= " INNER JOIN tbl_products ON tbl_products.product_id = tbl_sale_detail.product_id";
        $sql .= " WHERE doc_date = '$date1' ";
        $sql .= " AND tbl_sale_detail.IsActive = 'Y' AND tbl_sale_detail.IsDelete = 'N' 
                  AND tbl_sale_detail.IsComplete = 'Y'  ";
        $sql .= "       GROUP BY tbl_sale_detail.product_id
                        ORDER BY sum_qty DESC
                        LIMIT 0,10 ";
        // echo "<pre> $sql </pre> ";
        $rs = $this->query($sql);
        return ($rs);
    }

    function SaleTopMonth($mm )
    {
        $sql = "SELECT product_name, sum(sale_qty) AS sum_qty FROM tbl_sale_detail ";
        $sql .= " INNER JOIN tbl_products ON tbl_products.product_id = tbl_sale_detail.product_id";
        $sql .= " WHERE MONTH(doc_date) = '$mm' ";
        $sql .= " AND tbl_sale_detail.IsActive = 'Y' AND tbl_sale_detail.IsDelete = 'N' 
                  AND tbl_sale_detail.IsComplete = 'Y'  ";
        $sql .= "       GROUP BY tbl_sale_detail.product_id
                        ORDER BY sum_qty DESC
                        LIMIT 0,10 ";
        // echo "<pre> $sql </pre> ";
        $rs = $this->query($sql);
        return ($rs);
    }

    function MemberTopToday($date1 )
    {
        $sql = "SELECT tbl_members.member_name, SUM(sum_price) as sum_price from tbl_sale_header  ";
        $sql .= "	INNER JOIN tbl_members ON tbl_members.member_id = tbl_sale_header.member_id ";
        $sql .= " WHERE doc_date = '$date1' ";
        $sql .= " AND tbl_sale_header.IsActive = 'Y' AND tbl_sale_header.IsDelete = 'N' 
                  AND tbl_sale_header.IsComplete = 'Y'  ";
        $sql .= "       GROUP BY tbl_sale_header.member_id
                        ORDER BY sum_price DESC
                        LIMIT 0,10 ";
        // echo "<pre> $sql </pre> ";
        $rs = $this->query($sql);
        return ($rs);
    }
    function MemberTopMonth($mm )
    {
        $sql = "SELECT tbl_members.member_name, SUM(sum_price) as sum_price from tbl_sale_header  ";
        $sql .= "	INNER JOIN tbl_members ON tbl_members.member_id = tbl_sale_header.member_id ";
        $sql .= " WHERE MONTH(doc_date) = '$mm' ";
        $sql .= " AND tbl_sale_header.IsActive = 'Y' AND tbl_sale_header.IsDelete = 'N' 
                  AND tbl_sale_header.IsComplete = 'Y'  ";
        $sql .= "       GROUP BY tbl_sale_header.member_id
                        ORDER BY sum_price DESC
                        LIMIT 0,10 ";
        // echo "<pre> $sql </pre> ";
        $rs = $this->query($sql);
        return ($rs);
    }

}



?>