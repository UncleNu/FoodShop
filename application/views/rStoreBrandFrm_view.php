<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->
<div class="container">
<h5> รายการเบิกสินค้า แยกตามยี่ห้อ </h5>
    <?php
    $xDate1 = date("Y") . "-" . date("m") . "-01";
    $xDate2 = date("Y-m-d");

    ?>

    <form method="POST" class="form-inline" action="<?php echo BASE_URL; ?>reports/rStoreBrand">
        <div class="form-group"> 
            <label for="">จากวันที่ : </label>
            <input type="date" name="xDate1" id="xDate1" class="form-control" value="<?php echo $xDate1; ?>">
            <small id="helpId" class="text-muted"> </small>


            <label for="">ถึงวันที่ : </label>
            <input type="date" name="xDate2" id="xDate2" class="form-control" value="<?php echo $xDate2; ?>">
            <small id="helpId" class="text-muted"> </small>

            <label for=""> &nbsp; &nbsp; &nbsp; </label>
            <input type="submit" class="btn btn-info" value="Submit">
        </div>
    </form>






</div>


<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer"); ?>