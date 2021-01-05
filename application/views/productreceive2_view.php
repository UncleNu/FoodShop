<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->
<form action="<?php echo BASE_URL; ?>products/actReceive2" method="post">
<div class="form-group">
  <label for=""></label>
 
<?php

    foreach ($product_data as $key_product_data => $value_product_data) {
 ?>
  <input type="hidden" name="product_id" id="product_id" value="<?php echo $value_product_data->product_id;?>" class="form-control" placeholder="กรอกรหัสบาร์โค๊ดที่นี่ " aria-describedby="helpId">
  <input type="text" readonly name="product_name" id="product_name" value="<?php echo $value_product_data->product_name;?>" class="form-control" placeholder="กรอกรหัสบาร์โค๊ดที่นี่ " aria-describedby="helpId">

  <input type="text" name="receive_qty" id="receive_qty" class="form-control" placeholder="จำนวนรับเข้า " aria-describedby="helpId">
 
 
 <?php 
    }
?>






  <input type="submit" class="btn btn-info mx-auto" value="บันทึกการรับเข้า">
</div>
</form>


<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer"); ?>