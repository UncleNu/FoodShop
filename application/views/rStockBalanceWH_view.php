<?php $this->loadLayout("role/layout/header");  ?>

<!-- -------------------------------------------------------------------------------------------- -->
<?php $x_balance = 0;  $x_style = "color: black;"; $tmpx=""; ?>
<?php $rc1 = 0; $rc2=0; $rc=0; $wd1=0;$wd2=0;$wd=0; ?>
<?php $wh1 = 0; $wh2=0; ?>
<div class="container">

    <div class="card">
        <div class="card-header">
            <h3>รายงานสต็อกคงเหลือ แยกคลังเก็บ</h3>
        </div>

        <div class="card-body">

            <table class="table table-bordered" id="dt">
                <thead>
                    <tr>

                        <td>barcode</td>
                        <td>ชื่อสินค้า</td>
                        <!-- <td>MAX</td>
                        <td>MIN</td> -->
                        <td>หน้าร้าน</td>
                        <td> คลังสต็อก</td>
                        <td>คงเหลือ</td>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($rptValue as $key => $value) {
                        $x_product_id = $value->product_id;
                        $x_product_barcode = $value->barcode;
                        $x_product_name = $value->product_name;
                       $x_max = $value->product_max;
                       $x_min = $value->product_min;
                       $x_receive = $value->ReceiveProduct;
                       $x_sale = $value->SaleProduct;
                       $x_balance = $x_receive - $x_sale;
                       
                       $rc1 = $value->ReceiveProductWH1;     
                       $rc2 = $value->ReceiveProductWH2;     

                       $wd1 = $value->SaleProductWH1;     
                       $wd2 = $value->SaleProductWH2;  

                       $wh1 = $rc1 - $wd1;     
                       $wh2 = $rc2 - $wd2;     

                       if ($x_balance <= $x_min) {
                        $x_style = "color:red; ";
                       } else if ($x_balance >= $x_max){
                        $x_style = "color:blue; ";
                       } else {
                        $x_style = "color:black; ";
                       }

                       if ($x_max == null){
                        $x_style = "color: black;";
                       } else if($x_min == null){
                        $x_style = "color: black;";
                       }


                    ?>
                    <tr>
                        <td><?php echo $x_product_barcode; ?></td>
                        <td><?php echo $x_product_name; ?></td>
                        <!-- <td style="text-align: center; "><?php echo $x_max; ?></td>
                        <td style="text-align: center;"><?php echo $x_min; ?></td> -->
                        <td style="text-align: center;"><?php echo $wh1; ?></td>
                        <td style="text-align: center;"><?php echo $wh2; ?></td>



                        <td style="text-align: center;<?php echo $x_style; ?>"> <?php echo $x_balance; ?></td>
                    </tr>
                    <?php }  ?>

                </tbody>



            </table>


        </div>
        <div class="alert alert-warning w-50 align-items-center">รายงานนี้ไม่รวมสินค้าประเภทฝากขาย</div>
    </div>







</div>

<!-- -------------------------------------------------------------------------------------------- -->


<script>
$(document).ready(function() {

    $("#dt").DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Thai.json"
        },
        "dom": '<"top"p>rt<"bottom"flp><"clear">',
        stateSave: true,
        "paging": true,
        "responsive": true,
        "autoWidth": false,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5' , 
            {
                extend: 'print',
            text: 'พิมพ์เอกสาร',
            title: '<h5> รายงานสต็อกคงเหลือ</h5>  <h6> ประจำวันที่ <?php echo date("Y-m-d h:i:s"); ?> </h6>',
            }
           
        ]
    });


    $('#dt0').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Thai.json"
        },
        dom: 'Bfrtip',
        buttons: [{
            extend: 'print',
            text: 'พิมพ์เอกสาร',
            title: '<h6> ระหว่างวันที่ :  ',

            customize: function(win) {
                $(win.document.body)
                    .css('font-size', '10pt')
                    .prepend(
                        // '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                    );

                $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
            }
        }]
    });
});
</script>
<?php $this->loadLayout("role/layout/footer"); ?>