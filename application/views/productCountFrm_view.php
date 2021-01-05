<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->
<br>
<div class="card">
    <div class="card-header">
        <h3>ตรวจนับสต็อก</h3>
    </div>

    <div class="card-body">

<?php 
foreach ($product_data as $key => $value) {
    $x_product_id = $value->product_id;
    $x_product_name  = $value->product_name;
    $x_product_unit = $value->unit_name;
}

?>

<form method="POST" action="<?php echo BASE_URL; ?>products/CheckStockAction" >


    <table class="table table-bordered">
        <tr>
            <td>  ID</td>
            <td>
            <?php echo $x_product_id; ?>
        <input type="hidden" name="product_id" id="product_id" value="<?php echo $x_product_id; ?>">   
        </td>
        </tr>
        <tr>
            <td>ชื่อสินค้า</td>
            <td><?php echo $x_product_name; ?> </td>
        </tr>
        <tr>
            <td>วันที่ </td>
            <td><?php echo date("d/M/Y");?>
            <input type="hidden" name="doc_date" id="doc_date" value="<?php echo date("d/M/Y");?>">   
        
        </td>
        </tr>
        <tr>
            <td>จำนวน</td>
            <td> 

            <input type="text" name="product_qty" id="product_qty">
            <?php echo $x_product_unit; ?>
            </td>
        </tr>
    </table>

<input type="submit" value="submit" class="btn btn-success btn-lg">

</form>


<?php ?>



    
    </div>
</div>





<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer"); ?>