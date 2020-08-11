<?php
class qt_model extends Model
{
    function QtSumData($date1, $date2)
    {
        $sql = "SELECT count(qt_id) as data_value  FROM tbl_qt_header  ";
        $sql .= " WHERE qt_date BETWEEN '$date1' AND '$date2' AND complete_flag = 'Y' ";
        // echo "<pre> $sql </pre> ";
        $rs = $this->query($sql);
        return ($rs);
    }
    function QtSumCustomerType($date1, $date2, $ctmtype)
    {
        $sql = "SELECT
        cnf_customer_type.type_name,
        count(qt_id) as data_value  
            FROM  tbl_qt_header
            INNER JOIN cnf_customer_car ON tbl_qt_header.car_id = cnf_customer_car.car_id
            INNER JOIN cnf_customer ON cnf_customer_car.customer_id = cnf_customer.customer_id
            INNER JOIN cnf_customer_type ON cnf_customer.customer_type = cnf_customer_type.type_id            
        
         WHERE qt_date BETWEEN '$date1' AND '$date2' AND complete_flag = 'Y'   AND cnf_customer.customer_type = '$ctmtype'
         GROUP BY cnf_customer.customer_type; ";
        $res = $this->query($sql);
        return ($res);
    }

    function QtPrice($date1, $date2)
    {
        $sql = "   SELECT  SUM((qt_qty * qt_price)) as data_value  
        FROM   tbl_qt_detail
				INNER JOIN tbl_qt_header ON tbl_qt_header.qt_no = tbl_qt_detail.qt_no
        WHERE tbl_qt_detail.qt_date  BETWEEN '$date1' AND '$date2' AND tbl_qt_header.complete_flag = 'Y' 
        AND tbl_qt_header.delete_flag = 'N'        ";
        // echo "<pre> $sql </pre> ";
        $res = $this->query($sql);
        return ($res);
    }
    function QtCountCar($date1, $date2)
    {
        $sql = "SELECT
        COUNT(DISTINCT( tbl_qt_header.car_id)) as data_value
        FROM
        tbl_qt_header
        INNER JOIN tbl_qt_detail ON tbl_qt_header.qt_no = tbl_qt_detail.qt_no
        WHERE tbl_qt_detail.qt_date  BETWEEN '$date1' AND '$date2' AND tbl_qt_header.complete_flag = 'Y' 
        AND tbl_qt_header.delete_flag = 'N' 
        
        ";
        $res = $this->query($sql);
        return ($res);
    }
}
