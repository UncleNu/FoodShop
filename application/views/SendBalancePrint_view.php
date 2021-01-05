<?php $this->loadLayout("role/layout/header");  ?>
<style>

@media print {
.no-print, .no-print * {
display: none !important;
}
}

</style>
<!-- -------------------------------------------------------------------------------------------- -->
<div class="container">

    <input type="button" onclick="printDiv('printableArea')" value="พิมพ์ ใบส่งยอด " class="mx-1 btn btn-secondary " />
    <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>
    <div id="printableArea" style="width:90%; margin:auto">


        <?php
//print_r($send_data);

foreach ($send_data as $key => $value) {
    $d1 = $value->d1;
    $d2 = $value->d2;
    $sum_price = $value->sum_price;
    $send_money = $value->send_money;
    $send_comment = $value->send_comment;
}

?>
<h4>รายงานการส่งยอด</h4>
<table>
    <tr>
        <td style="width: 200px;">ระหว่างวันที่</td>
        <td style="width: 500px;"><?php echo $d1 ?></td>
    </tr>

    <tr>
        <td>ถึงวันที่</td>
        <td><?php echo $d2 ?></td>
    </tr>  
    
  
    <tr>
        <td>ยอดขาย</td>
        <td><?php echo $sum_price ?></td>
    </tr>    
    <tr>
        <td>ยอดส่ง</td>
        <td><?php echo $send_money ?></td>
    </tr>  

    <tr>
        <td>หมายเหตุ</td>
        <td><?php echo $send_comment ?></td>
    </tr>  
    <tr>
        <td> <br><br><br> </td>
        <td> </td>
    </tr>
    <tr>
        <td> </td>
        <td> </td>
    </tr>
    <tr>
        <td> </td>
        <td> </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;"> ผู้ส่ง ...............................</td>   
    </tr>
    <tr>
        <td> <br>  </td>
        <td> </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;"> ( ...............................)</td>   
    </tr>
    <tr>
        <td> <br>  </td>
        <td> </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;"> <?php echo date("Y-m-d h:i:s"); ?> </td>   
    </tr>
</table>

 

    </div>
</div>
<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer"); ?>
<script type="text/javascript">
//คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
$(function() {

    var groupColumn = 2;
    $('#dtab').dataTable({
        'searching': true,
        "order": [
            [1, 'desc'],
            [0, 'asc']
        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>