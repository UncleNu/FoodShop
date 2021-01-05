<?php $this->loadLayout("role/layout/header");  ?>
<style>
@media print {

    .no-print,
    .no-print * {
        display: none !important;
    }
}
</style>
<!-- -------------------------------------------------------------------------------------------- -->
<?php $x_sum = 0; ?>
<div class="container">

    <div class="card">
        <input type="button" onclick="printDiv('printableArea')" value="พิมพ์ ใบส่งยอด " class="mx-1 btn btn-info " />
        <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
        </script>
        <div class="card-header">
            <h3>ใบส่งยอด</h3>
        </div>

        <div class="card-body">



            <div id="printableArea" style="width:90%; margin:auto">

                <h3>ใบส่งยอด</h3>
                <h5>วันที่ <?php echo $xDate1; ?> - <?php echo $xDate2; ?> </h5>




                <table class="table table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <td>รายการสินค้า</td>
                            <td>รวมเป็นเงิน</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($rptValue as $key => $value) 
                    { $x_sum = $x_sum +  $value->Sum_price;
                         ?>
                        <tr>
                            <td><?php echo $value->product_type_name; ?></td>
                            <td style="text-align: right;"><?php echo @number_format($value->Sum_price,2); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>รวมเป็นเงิน</td>
                            <td style="text-align: right;"><?php echo @number_format( $x_sum,2); ?></td>
                        </tr>
                    </tfoot>

                </table>

                <br>
                <table style="width: 100%;">
                    <tr style="text-align: center; padding: 20px;">
                        <td> <br>
                            <br>
                            <br>................................................
                        </td>
                        <td> <br>
                            <br>
                            <br>................................................
                        </td>
                        <td> <br>
                            <br>
                            <br>................................................
                        </td>
                        <td> <br>
                            <br>
                            <br>................................................
                        </td>
                    </tr>
                    <tr style="text-align: center;">
                        <td><br> ( ................................................) </td>
                        <td><br> ( ................................................) </td>
                        <td><br> ( ................................................) </td>
                        <td><br> ( ................................................) </td>
                    </tr>




                </table>





            </div>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>



<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer"); ?>