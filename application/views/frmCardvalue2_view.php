<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->
<?php
        $card_type_name = "";

    if($card_type_id == 1) {
        $card_type_name = "พนักงานประจำ";
    } else if($card_type_id == 2) {
        $card_type_name = "พนักงานชั่วคราว";
    } else if($card_type_id == 3) {
        $card_type_name = "บัตรทั่วไป";
    } else {
        $card_type_name = "Error";
    }

?>
<div class="container">
    <div>
        <h3>เติมเงินบัตร [ <?php echo $card_type_name; ?> ]</h3>
    </div>
    <?php
    $xDate1 = date("Y") . "-" . date("m") . "-01";
    $xDate2 = date("Y-m-d");
        // $x_type_id = $_GET["card_type_id"];
    //  echo $card_type_id;
    ?>
    <form method="POST" class="form-inline" action="<?php echo BASE_URL; ?>cardvalue/insert_value">
    <input type="hidden" name="card_type_id" id="card_type_id" value="<?php echo $card_type_id;?>">
    <input type="text" name="card_no" id="card_no" value="">
        <div class="form-group">
            <label for="">มูลค่าบัตร : </label>
    <input type="text" name="card_value" id="card_value" value="0">

       

            <label for="">วันหมดอายุ : </label>
            <input type="date" name="card_expire" id="card_expire" class="form-control" value="">
            <small id="helpId" class="text-muted"> </small>

            <label for=""> &nbsp; &nbsp; &nbsp; </label>
            <input type="submit" class="btn btn-info" value="Submit">
        </div>
    </form>

    <!-- -------------------------------------------------------------------------------------------- -->
</div>
<?php $this->loadLayout("role/layout/footer"); ?>