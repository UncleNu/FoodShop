<?php $this->loadLayout("role/layout/header");  ?>
<style>
@media print {

    .no-print,
    .no-print * {
        display: none !important;
    }
}
</style>


<p></p>
<!-- <input type="button" onclick="printDiv('printableArea')" value="พิมพ์รายงานการขาย " class="mx-1 btn btn-secondary " /> -->
<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
<?php 
    $dt1 = $xDate1 . " " . $xTime1; 
    $dt2 = $xDate2 . " " . $xTime2; 

?>

<div class="container" id="printableArea">
    <div class="card">
        <div class="card-body">
            <h3>รายงานการขาย</h3>
            <?php $x_product_name = ""; 
   foreach ($product_name as $key => $value) {
      $x_product_name = $value->product_name;
   }
?>
            <?php if ($x_product_name != ""){ ?>
            <h5>สินค้า : <?php echo $x_product_name; ?></h5>
            <?php } ?>
            <hr>

            <table class="table table-bordered table-hover" id="dt">
                <thead>
                    <tr>
                        <th colspan="5">

                            <h6>ระหว่างวันที่ : <?php echo $dt1; ?> ถึงวันที่ <?php echo $dt2; ?></h6>
                        </th>
                    </tr>
                    <tr>
                        <th>ลำดับ</th>
                        <th>สินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคาขาย</th>
                        <th>ราคาทุน</th>
                        <th>รวมเป็นเงิน</th>
                        <th>กำไร/ขาดทุน</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $RowRunning = 0;
                            $x_qty = 0;
                            $x_unit_price = 0;
                            $x_total_price = 0;
                            $x_sum_price = 0;
                            $x_sum_profit = 0;
$x_profit = 0;$x_unit_cost = 0;
                            foreach ($rpt_data as $key => $value) {
                              
                            $x_CountProduct = $value->CountProduct;
                            $x_PriceProduct = $value->PriceProduct;
                            $x_unit_price = $value->unit_price;
                            $x_sum_price    = $x_sum_price +  $x_PriceProduct ;
$x_unit_cost = $value->unit_cost;
                            $x_profit = $x_PriceProduct - ($x_CountProduct * $x_unit_cost )    ;
                            $x_sum_profit =  $x_sum_profit  + $x_profit;
                            if ($x_CountProduct > 0 ) {
                                $RowRunning = $RowRunning + 1;
?>
                    <tr>
                        <td><?php echo $RowRunning;  ?></td>
                        <td scope="row"><?php echo $value->product_name; ?></td>
                        <td style="text-align: right;"><?php echo @number_format($x_CountProduct,0);  ?></td>
                        <td style="text-align: right;"><?php echo @number_format($x_unit_price,2);  ?></td>
                        <td style="text-align: right;"><?php echo @number_format($value->unit_cost,2); ?></td>

                        <td style="text-align: right;"><?php echo @number_format($x_PriceProduct,2);  ?></td>

                        <td style="text-align: right;"> <?php echo @number_format($x_profit,2);  ?> </td>

                    </tr>
                    <?php } ?>
                    <?php } ?>
                </tbody>

                <tr>
                    <td colspan="5" style="text-align:right; font-weight:bolder ">รวมเป็นเงิน</td>
                    <td style="text-align: right;"><?php echo @number_format($x_sum_price,2); ?></td>
                    <td style="text-align: right;"><?php echo @number_format($x_sum_profit,2); ?></td>
                 
                </tr>

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
            title: '<h5> รายงานการขาย </h5>  <h6> ระหว่างวันที่ : <?php echo $dt1; ?> ถึงวันที่ <?php echo $dt2; ?> <h6>',
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