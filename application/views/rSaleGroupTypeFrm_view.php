<?php $this->loadLayout("role/layout/header");  ?>
<h3>รายงานการรับสินค้าเข้า</h3>
<form action="<?php echo BASE_URL; ?>reports/rSaleGroupType" method="post">

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
                    <label for="">ถึงวันที่</label>
                    <input type="date" name="d2" id="d2" required class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">ร้านค้า/ผู้ขาย</label>
                    <select class="form-control" name="saler_id" id="saler_id">
                        <option value="0"> กรุณาเลือกรายการ</option>
                        <?php 
                            foreach ($salerlist as $key_salerlist => $value_salerlist) {
                               $x_saler_id = $value_salerlist->saler_id;
                               $x_saler_name = $value_salerlist->saler_name;
                               echo " <option value=$x_saler_id>$x_saler_name</option>";
                            }

                        ?>
                                              
                    </select>
                </div>
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
<?php echo @$xDate1; ?>
<?php echo @$xDate2; ?>

<?php $this->loadLayout("role/layout/footer"); ?>