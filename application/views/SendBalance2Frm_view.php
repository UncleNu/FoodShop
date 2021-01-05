<?php $this->loadLayout("role/layout/header");  ?>
<h3>ส่งยอด </h3>
<form action="<?php echo BASE_URL; ?>sendbalance/act2" method="post">
    <?php
// echo $xd1;
// echo $xd2;
$x_price = 0; $x_qty = 0; $x_Sum_price = 0; $x_sum = 0;
foreach ($rpt_data as $key => $value) {
   $x_price = $value->unit_price;
   $x_qty = $value->sale_qty;
   $x_Sum_price = $x_qty * $x_price;
   $x_sum = $x_sum + $x_Sum_price;
//    echo "<br>" .  $x_Sum_price;
}
?>
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">ระหว่างวันที่</label>
                    <input type="text" name="d1" id="d1" readonly value="<?php echo $xd1; ?>" required
                        class="form-control">


                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">ถึงวันที่</label>
                    <input type="text" name="d2" id="d2" readonly value="<?php echo $xd2; ?>" required
                        class="form-control">

                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="">ยอดขาย</label>
                    <input type="text" name="sum_price" id="sum_price" required value="<?php echo $x_sum; ?>"
                        class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">ยอดส่ง</label>
                    <input type="text" name="send_money" id="send_money" required value="<?php echo $x_sum; ?>"
                        class="form-control">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="">หมายเหตุ</label>
                    <input type="text" name="send_comment" id="send_comment" value="" class="form-control">
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for=""> </label>
                    <br>
                    <!-- <input type="submit" value="บันทึก" class="btn btn-success btn-lg"> -->
                </div>
            </div>

        </div>


</form>


<style>
@media print {

    .no-print,
    .no-print * {
        display: none !important;
    }
}
</style>

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

<div class="card" id="printableArea">
    <div class="card-body">
        <h2>รายงานสรุปยอดขาย</h2>
        <h5>ระหว่างวันที่ <?php echo $xd1; ?> ถึง วันที่ <?php echo $xd2; ?></h5>
        <h5>สรุปยอดขาย <?php echo number_format( $x_sum); ?> บาท</h5>
        <hr>
        <table class="table table-bordered table-hover">
            <thead>

                <th>ชื่อ-สกุล พนักงานขาย</th>
                <th>ยอดขาย</th>
            </thead>
            <tbody>
                <?php
        $sum_price = 0;
    foreach ($sale_data as $key => $value) {
        $sum_price = $sum_price + $value->SUM_Sale;
        ?>
                <tr>

                    <td><?php echo $value->user_name; ?></td>
                    <td style="text-align: right;"><?php echo @number_format($value->SUM_Sale,2); ?></td>
                </tr>

                <?php 
    }


?>
            </tbody>
            <tfoot>
                <tr>
                    <td style="text-align: right;font-weight: bolder;">รวม</td>
                    <td style="text-align: right;font-weight: bolder; "> <?php echo number_format($sum_price,2); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h4>แบ่งตามเครื่องขาย</h4>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>รหัสเครื่อง</th>
                        <th>ยอดขาย</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sum_station = 0;
                foreach ($station_data as $key => $value) {
                        $sum_station = $sum_station + $value->SUM_Staion;
                ?>
                    <tr>
                        <td><?php echo $value->station_code; ?></td>
                        <td style="text-align: right;"><?php echo number_format( $value->SUM_Staion,2); ?></td>
                    </tr>
                    <?php    } ?>
                </tbody>
                <tfoot>
                    <tr style="text-align: right;font-weight: bolder;">
                        <td>รวม</td>
                        <td><?php echo number_format($sum_station,2); ?></td>

                    </tr>
                </tfoot>


            </table>


        </div>
        <div class="col-md-6">
            <h4>แบ่งตามประเภทสินค้า</h4>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ประเภทสินค้า</th>
                        <th>ยอดขาย</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sum_type = 0;
                foreach ($type_data as $key => $value) {
                        $sum_type = $sum_type + $value->SUM_Type;
                ?>
                    <tr>
                        <td><?php echo $value->product_type_name; ?></td>
                        <td style="text-align: right;"><?php echo number_format( $value->SUM_Type,2); ?></td>
                    </tr>
                    <?php    } ?>
                </tbody>
                <tfoot>
                    <tr style="text-align: right;font-weight: bolder;">
                        <td>รวม</td>
                        <td><?php echo number_format($sum_type,2); ?></td>

                    </tr>
                </tfoot>


            </table>


        </div>




    </div>
 
   
    <table class="table">
        <tr>
            <td style="text-align: center;">
            <br>
    <br>
            ( ...........................................) ผู้ส่งเงิน
            <br>
        
    
            <br>
            </td>
            <td style="text-align: center;">
            <br>
    <br>
            ( ...........................................) ผู้รับเงิน
        <br>
     
     
        <br>
            </td>
        </tr>
    </table>



     
     
</div>
</div>



<?php $this->loadLayout("role/layout/footer"); ?>