<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
foreach ($product_data as $key => $value) {
    $x_barcode = $value->barcode;
    $x_product_name = $value->product_name;
    $x_qty1 =  $value->qty1;
    $x_qty2 =  $value->qty2;
}
foreach ($sale_data as $key => $value) {
    $sale_value = $value->data_value;
}

?>

    <div class="container">
        <h2>ระบบตรวจสอบสินค้า</h2>

        <form action="<?php echo BASE_URL; ?>cstock/cstockact" method="POST">
            <table style="text-align: center; font-size: 30px; " class="table">
                <tr>
                    <td>รหัสบาร์โค๊ด</td>
                    <td><input type="text" name="barcode" id="barcode" style="text-align: center; font-size: 30px; "
                            class="form-control" value="<?php echo $x_barcode; ?>"> </td>
                </tr>

                <tr>
                    <td>ชื่อสินค้า</td>
                    <td><input type="text" style="text-align: center; font-size: 30px; " name="" id=""
                            class="form-control" value="<?php echo $x_product_name; ?>">
                    </td>

                </tr>
                <tr>
                    <td>จำนวนจ่ายออก</td>
                    <td><input type="text" style="text-align: center; font-size: 30px; "
                            value="<?php echo $x_qty2; ?>" name="sale_qty" id="sale_qty" class="form-control">
                           

                </tr>
                <tr>
                    <td>จำนวนที่เจอ</td>
                    <td><input type="text" style="text-align: center; font-size: 30px; " name="qty2" id="qty2"
                            class="form-control"> </td>

                </tr>
            </table>
            <div style="text-align: center;">
                <a href="<?php echo BASE_URL; ?>cstock" class="btn btn-lg btn-info">ย้อนกลับ</a>
                <input type="submit" value="บันทึก" class="btn btn-lg btn-success">
            </div>

        </form>

<hr>
<h3>Today Receive</h3>
<table class="table table-bordered "> 
    <thead>
        <tr>
            <th>ID</th>
            <th>barcode</th>
            <th>จำนวนรับ</th>
            <th>ผู้รับ</th>
        </tr>
    </thead>
<tbody>


<?php
    foreach ($rc_data as $key => $value) {
?>
    <tr>
        <td><?php echo $value->receive_id; ?></td>
        <td><?php echo $value->barcode; ?></td>
        <td><?php echo $value->qty2; ?></td>
        <td><?php echo $value->user_name; ?></td>
    </tr>

<?php
    }

?>
</tbody>
</table>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>