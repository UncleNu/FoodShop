<?php $this->loadLayout("role/layout/header");  ?>
<title>รายงานการขาย</title>
<style> 
@media print {
    .no-print, .no-print * {
        display: none !important;
    }
}
</style>


<p></p>
<!-- <input type="button" onclick="printDiv('printableArea')" value="พิมพ์รายงานการขาย " class="mx-1 btn btn-secondary " />
                <script>
                    function printDiv(divName) {
                        var printContents = document.getElementById(divName).innerHTML;
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        window.print();
                        document.body.innerHTML = originalContents;
                    }
                </script>
 -->

<div class="container-fluid" id="printableArea">
    <div class="card">
        <div class="card-body">
            <h3>รายงานการขาย แบบละเอียด</h3>
            <?php $x_product_name = ""; 
   
?>
 
            <hr>
     
            <table class="table table-bordered table-hover" id="datatable">
                <thead>
                    <tr>
                        <th colspan="13">
                       
                            <h6>ระหว่างวันที่ : <?php echo $xDate1; ?> ถึงวันที่ <?php echo $xDate2; ?></h6>
                        </th>
                    </tr>
                    <tr>
                        <th>ลำดับ</th>
                        <th>วันที่</th>
                        <th>เลขบิล</th>

                        <th>สินค้า</th>
                        <th>จำนวน</th>
                        <th>หน่วยนับ</th>
                        <th>ราคาขายหน้าร้าน</th>
                        <th>รวมเป็นเงิน</th>
                        <th>ประเภทสินค้า</th>
                        <th>ราคาขาย</th>
                        <th>ราคาทุน</th>
                        
                        <th>พนักงานขาย</th>
                        <th>วันที่ทำรายการ</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tmp_star = "";
                    $tmp_css = "";
                    $RowRunning = 0;
                            $x_qty = 0;
                            $x_unit_price = 0;
                            $x_total_price = 0;
                            $x_sum_price = 0;

                            foreach ($rpt_data as $key => $value) {
                              
                          
                         
                            $x_unit_price = $value->unit_price;
                            $x_qty = $value->sale_qty;
                            $x_total_price    = $x_qty *  $x_unit_price ;
                            $x_sum_price    = $x_total_price +  $x_sum_price ;
                            $price_system= $value->price_system;
                            $price_cost= $value->price_cost;
                            if($x_unit_price == $price_system){
                    $tmp_css = "";
                    $tmp_star = "";
                            } else {
                                $tmp_star = "***";
                                $tmp_css = "style='background-color: #D3D3D3;'";

                            }
?>
                    <tr  <?php echo $tmp_css; ?>>
                        <td><?php echo $value->runno;  ?></td>
                        <td scope="row"><?php echo $value->doc_date; ?></td>
                        <td scope="row"><?php echo $value->bill_no; ?></td>
                        <td scope="row"><?php echo $value->product_name; ?></td>
                        <td style="text-align: right;"><?php echo @number_format($value->sale_qty,0);  ?></td>
                        <td scope="row"><?php echo $value->unit_name; ?></td>
                        <td style="text-align: right;"><?php echo $tmp_star; ?><?php echo @number_format($x_unit_price,2);  ?></td>
                        <td style="text-align: right;"><?php echo @number_format($x_total_price,2);  ?></td>
                        
                        <td scope="row"><?php echo $value->product_type_name; ?></td>

                        <td style="text-align: right;"><?php echo @number_format($price_system,2);  ?></td>
                        <td scope="row"><?php echo $value->price_cost; ?></td>
                        <td scope="row"><?php echo $value->user_name; ?></td>
                        <td scope="row"><?php echo $value->IsComplete_date; ?></td>

                    </tr>
                    
                    <?php } ?>
                </tbody>
              
                    <tr>
                        <td colspan="9" style="text-align:right; font-weight:bolder ">รวมเป็นเงิน</td>
                        <td style="text-align: right;"><?php echo @number_format($x_sum_price,2); ?></td>
                        <td colspan="3" style="  font-weight:bolder "> บาท</td>

                    </tr>
                        
            </table>





        </div>


    </div>
</div>



<script>
$(function() {
 

    $("#dt").DataTable({
        "responsive": true,
        "autoWidth": false,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5' 
        ]
    });
    $('#dt2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>

<?php $this->loadLayout("role/layout/footer"); ?>