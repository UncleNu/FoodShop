<?php $this->loadLayout("role/layout/header");  ?>
<h3>ส่งยอด</h3>
<form action="<?php echo BASE_URL; ?>sendbalance/act" method="post">

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
                    <label for="">เวลา : </label>
                    <input type="text" name="t1" id="t1" class="form-control" value="15:00:00">
                    <small id="helpId" class="text-muted"> </small>
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
                    <label for="">เวลา : </label>
                    <input type="text" name="t2" id="t2" class="form-control" value="15:00:00">
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