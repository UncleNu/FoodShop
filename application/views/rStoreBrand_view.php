<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->
<div class="container">
    <h5> รายการเบิกสินค้า แยกตามยี่ห้อ </h5> ระหว่างวันที่ <?php echo $xDate1 ?> ถึง <?php echo $xDate2 ?>
    <table class="table  table-hover" id="dtab">
        <thead>
            <tr>

                <th>ยี่ห้อ</th>
                <th>จำนวน</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($rStoreBrand as $key_rStoreBrand => $value_rStoreBrand) {
                ?>
                <tr>
                    <td scope="row"><?php echo $value_rStoreBrand->brand_name; ?></td>
                    <td><?php echo number_format($value_rStoreBrand->qty, 0); ?></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>









<!-- -------------------------------------------------------------------------------------------- -->

<?php $this->loadLayout("role/layout/footer"); ?>
<script type="text/javascript">
    //คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
    $(function() {

        var groupColumn = 2;
        $('#dtab').dataTable({
            'searching': true,
            "order": [
                [1, 'desc'],
                [0, 'asc']
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>