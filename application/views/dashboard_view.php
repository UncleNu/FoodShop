<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->
<?php echo @$_SESSION['user_name'] ; ?>
<div class="container">

    <!-- ------------------------------------------------------------------------------------------- -->
    <?php 
$x_SaleToday = 0; $x_SaleToMonth = 0;   $x_countMember = 0;
foreach ($saleToDay as $key_saleToDay => $value_saleToDay) {
 $x_SaleToday = $value_saleToDay->sum_price;
}
foreach ($saleToMonth as $key_saleToMonth => $value_saleToMonth) {
  $x_SaleToMonth = $value_saleToMonth->sum_price;

}

foreach ($countMember as $key_countMember => $value_countMember) {
  $x_countMember = $value_countMember->count_member;

}

?>
    <div class="row">
        <div class="col-md-6">
            <h2>ร้านค้าสวัสดิการ</h2>
        </div>
        <div class="col-md-6"></div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-3 col-md3">
            <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="far fa-calendar-check"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">ยอดขายประจำวัน</span>
                    <span class="info-box-number">
                        <?php echo number_format( $x_SaleToday , 0); ?>
                        <small> บาท</small>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-12 col-sm-3 col-md3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="far fa-calendar-alt"></i></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">ยอดขายประจำเดือน</span>
                    <span class="info-box-number">
                        <?php echo number_format($x_SaleToMonth,0) ; ?>
                        <small> บาท </small>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-12 col-sm-3 col-md3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">จำนวนสมาชิก</span>
                    <span class="info-box-number"> <?php echo number_format($x_countMember,0) ; ?>
                        <small> คน </small>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>

    <!-- ------------------------------------------------------------------------------------------- -->

    <div class="row">
        <div class="card-columns  col-md-12">
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Top 10 ประจำวัน</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>รายการ</th>
                                <th>จำนวน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $iRec = 0;
                              foreach ($saleTopDay as $key_saleTopDay => $value_saleTopDay) {
                                  $iRec = $iRec + 1;
                            ?>

                            <tr>
                                <td scope="row"><?php echo $iRec; ?></td>
                                <td><?php echo $value_saleTopDay->product_name; ?></td>
                                <td style="text-align: right;"><?php echo $value_saleTopDay->sum_qty; ?></td>

                            </tr>
                            <?php
  }


?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">Top 10 ประจำเดือน</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>รายการ</th>
                                <th>จำนวน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                                        $iRec = 0;
                              foreach ($saleTopMonth as $key_saleTopMonth => $value_saleTopMonth) {
                                  $iRec = $iRec + 1;
                            ?>
                            <tr>
                                <td scope="row"><?php echo $iRec; ?></td>
                                <td><?php echo $value_saleTopMonth->product_name; ?></td>
                                <td style="text-align: right;"><?php echo $value_saleTopMonth->sum_qty; ?></td>

                            </tr>
                            <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">สมาชิกที่ใช้จ่ายมากที่สุดของวัน</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ</th>
                                <th>จำนวน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                                       $iRec = 0;
                             foreach ($memberTopToday as $key_memberTopToday => $value_memberTopToday) {
                                 $iRec = $iRec + 1;
                           ?>

                            <tr>
                                <td scope="row"><?php echo $iRec; ?></td>
                                <td><?php echo $value_memberTopToday->member_name; ?></td>
                                <td style="text-align: right;">
                                    <?php echo @number_format( $value_memberTopToday->sum_price ,2); ?></td>

                            </tr>
                            <?php
                               }
                               ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card">

                <div class="card-body">
                    <h4 class="card-title">สมาชิกที่ใช้จ่ายมากที่สุดของเดือน</h4>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ</th>
                                <th>จำนวน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $iRec = 0;
                             foreach ($memberTopMonth as $key_memberTopMonth => $value_memberTopMonth) {
                                 $iRec = $iRec + 1;
                           ?>

                            <tr>
                                <td scope="row"><?php echo $iRec; ?></td>
                                <td><?php echo $value_memberTopMonth->member_name; ?></td>
                                <td style="text-align: right;">
                                    <?php echo @number_format( $value_memberTopMonth->sum_price ,2); ?></td>

                            </tr>
                            <?php
                               }
                               ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>

</div>




<!-- ------------------------------------------------------------------------------------------- -->


</div>





<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer"); ?>