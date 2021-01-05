<?php $this->loadLayout("role/layout/header");  ?>
 
<?php 
    $dt1 = $xDate1 . " " .@$xTime1; 
    $dt2 = $xDate2 . " " . @$xTime2; 

?>
 
<p></p>


<div class="container-fluid">
    <div class="card w-100">
        <div class="card-body">
            <h3>รายงานการรับสินค้าเข้า</h3>
            <?php $x_saler_name = ""; 
   foreach ($saler_name as $key => $value) {
      $x_saler_name = $value->saler_name;
   }
?>

            <h5>ร้านค้า / ผู้ขาย : <?php echo $x_saler_name; ?></h5>
         
            <hr>

            <table class="table table-bordered table-hover" id="dt">
                <thead>
                    <tr>
                        <td colspan="5">
                        <h6>ระหว่างวันที่ : <?php echo $xDate1; ?> ถึงวันที่ <?php echo $xDate2; ?></h6>
                        </td>
                    </tr>
                    <tr>
                        <th>วันที่</th>
                        <th>สินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคาต่อหน่วย</th>
                        <th>รวมเป็นเงิน</th>
                        <th>วันหมดอายุ</th>
                        <th>หน่วยนับ</th>
                        <th>คลังเก็บ</th>
                      
                        <th>ประเภท</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$x_qty = 0;
$x_unit_price = 0;
$x_total_price = 0;
$x_sum_price = 0;
foreach ($rpt_data as $key => $value) {
 $x_qty = $value->qty1;
 $x_unit_price = $value->unit_price1;
 $x_total_price = $x_qty * $x_unit_price;
 $x_sum_price    = $x_sum_price +  $x_total_price ;

?>
                    <tr>
                        <td scope="row"><?php echo $value->doc_date; ?></td>
                        <td scope="row"> <?php echo $value->product_name; ?></td>
                        <td style="text-align: right;"><?php echo @number_format($x_qty,2);  ?></td>
                        <td style="text-align: right;"><?php echo @number_format($x_unit_price,2);  ?></td>
                        <td style="text-align: right;"><?php echo @number_format($x_total_price,2); ?></td>
                        <td><?php echo $value->exp_date; ?></td>
                        <td><?php echo $value->unit_name; ?></td>
                        <td><?php echo $value->wh_name; ?></td>
                        <td><?php echo $value->receive_type_name; ?></td>

                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" style="text-align:right; font-weight:bolder ">รวมเป็นเงิน</td>
                        <td style="text-align: right;"><?php echo @number_format($x_sum_price,2); ?></td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                       
                    </tr>
                </tfoot>
            </table>





        </div>


    </div>
</div>
 

<script>
$(document).ready(function() {

    $("#dt").DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Thai.json"
        },
        "dom": '<"top"p>rt<"bottom"flp><"clear">',
        stateSave: true,
        "paging": true,
        "responsive": true,
        "autoWidth": false,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5' , 
            {
                extend: 'print',
            text: 'พิมพ์เอกสาร',
            title: '<h5> รายงานการรับสินค้าเข้า </h5>  <h6> ระหว่างวันที่ : <?php echo @$dt1; ?> ถึงวันที่ <?php echo @$dt2; ?> <h6>',
            }
           
        ]
    });


    $('#dt0').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Thai.json"
        },
        dom: 'Bfrtip',
        buttons: [{
            extend: 'print',
            text: 'พิมพ์เอกสาร',
            title: '<h6> ระหว่างวันที่ : <?php echo $dt1; ?> ถึงวันที่ <?php echo $dt2; ?> <h6>',

            customize: function(win) {
                $(win.document.body)
                    .css('font-size', '10pt')
                    .prepend(
                        // '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                    );

                $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
            }
        }]
    });
});
</script>

<?php $this->loadLayout("role/layout/footer"); ?>