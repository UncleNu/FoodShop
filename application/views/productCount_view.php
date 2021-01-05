<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->
<br>
<div class="card">
    <div class="card-header">
        <h3>ตรวจนับสต็อก</h3>
    </div>

    <div class="card-body">

        <?php
        
        ?>

        <table class="table table-bordered table-hover" id="datatable">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>รายการสินค้า</td>
                    <td> </td>
                </tr>
            </thead>
           
            <tbody>
            <?php foreach ($product_data as $key => $value) { ?>
            <?php $x_product_id = $value->product_id ; ?>
                <tr>
                    <td><?php echo $value->product_id; ?></td>
                    <td><?php echo $value->product_name; ?></td>
                    <td> 
                        <a href="<?php echo BASE_URL; ?>products/CheckStockFrm/<?php echo $x_product_id; ?>" class="btn btn-info btn-mx"> นับสต็อก</a>
                    </td>

                </tr>
                <?php } ?>
            </tbody>

        </table>

        <?php ?>

    </div>
</div>





<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer"); ?>