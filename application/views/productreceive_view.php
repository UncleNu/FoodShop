<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->
<form action="<?php echo BASE_URL; ?>products/actReceive" method="post">
<div class="form-group">
  <label for=""></label>
  <input type="text" name="barcode" id="barcode" class="form-control" placeholder="กรอกรหัสบาร์โค๊ดที่นี่ " aria-describedby="helpId">
 
  <input type="submit" class="btn btn-info mx-auto" value="ตรวจสอบข้อมูลสินค้า">
</div>
</form>


<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer"); ?>