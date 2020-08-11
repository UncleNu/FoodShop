<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->
<div class="container-full">
    <h3> rGroupMonth_view </h3>

    <?php
    $allEmpData = array();
    foreach ($ProductValue as $key_ProductValue => $value_ProductValue) {
        $allEmpData[$value_ProductValue->product_code] = $value_ProductValue->product_name;
    }

    ?>



    <?php

    $allReportData = array();
    foreach ($rptValue as $key_rptValue => $value_rptValue) {
        $allReportData[$value_rptValue->product_code][$value_rptValue->bk_day] =  $value_rptValue->numBook;
    }

    ?>

    <?php


    echo "<table class='table table-bordered table-hover' id='test_report'  >";
    echo '<tr>'; //เปิดแถวใหม่ ตาราง HTML
    echo '<th>Products List</th>';
    //วันที่สุดท้ายของเดือน
    $timeDate = strtotime($xyear . '-' . $xmonth . "-01");  //เปลี่ยนวันที่เป็น timestamp
    $lastDay = date("t", $timeDate);       //จำนวนวันของเดือน
    //echo "$timeDate";
    //สร้างหัวตารางตั้งแต่วันที่ 1 ถึงวันที่สุดท้ายของดือน

    for ($day = 1; $day <= $lastDay; $day++) {
        echo '<th>' . substr("0" . $day, -2) . '</th>';
    }

    echo '<th> Sum </th>';
    echo "</tr>";
    //วนลูปเพื่อสร้างตารางตามจำนวนรายชื่อพนักงานใน Array

    foreach ($allEmpData as $empCode => $empName) {
        echo '<tr>'; //เปิดแถวใหม่ ตาราง HTML
        echo '<td>' . $empName . '</td>';
        //เรียกข้อมูลการจองของพนักงานแต่ละคน ในเดือนนี้
        $sumR = 0;
        for ($j = 1; $j <= $lastDay; $j++) {
            //ตรวจสอบว่าวันที่แต่ละวัน $j ของ พนักงานแต่ละรหัส  $empCode มีข้อมูลใน  $allReportData หรือไม่ ถ้ามีให้แสดงจำนวนในอาร์เรย์ออกมา ถ้าไม่มีให้เป็น 0
            $numBook = isset($allReportData[$empCode][$j]) ? '<div>' . $allReportData[$empCode][$j] . '</div>' : 0;
            if ($numBook == '0') {
                echo "<td class='number'> </td>";
            } else {
                echo "<td class='number'>", $numBook, "</td>";
                $sumR  = $sumR + $allReportData[$empCode][$j];
            }
        }
        echo "<td  class='number'> $sumR </td> ";
        echo '</tr>'; //ปิดแถวตาราง HTML
    }
    echo "</table>";

    ?>




</div>





<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer"); ?>