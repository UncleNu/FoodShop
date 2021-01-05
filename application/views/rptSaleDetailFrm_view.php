<?php $this->loadLayout("role/layout/header");  ?>
<h3>รายงานการขายสินค้า</h3>
<form action="<?php echo BASE_URL; ?>reports/rptSaleDetailList" method="post">

    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">ระหว่างวันที่</label>
                    <input type="date" name="d1" id="d1" required class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">เวลา</label>
                    <input type="text" name="t1" id="t1" required value="15:00:00" class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">ถึงวันที่</label>
                    <input type="date" name="d2" id="d2" required class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">เวลา</label>
                    <input type="text" name="t2" id="t2" required value="15:00:00" class="form-control">
                </div>
            </div>
            <!-- <div class="col-md-3">
                <div class="form-group">
                    <label for="">สินค้า</label>
                    <select class="form-control" name="product_id" id="product_id">
                        <option value="0"> กรุณาเลือกรายการ</option>
                        <?php 
                            foreach ($productlist as $key_productlist => $value_productlist) {
                               $x_product_id = $value_productlist->product_id;
                               $x_product_name = $value_productlist->product_name;
                               echo " <option value=$x_product_id>$x_product_name</option>";
                            }

                        ?>
                                              
                    </select>
                </div> -->
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for=""> </label>
                    <br>
                    <input type="submit" value="ค้นหา" class="btn btn-success btn-lg">
                </div>
            </div>

        </div>


</form>
<?php echo $xDate1; ?>
<?php echo $xDate2; ?>

<?php $this->loadLayout("role/layout/footer"); ?>