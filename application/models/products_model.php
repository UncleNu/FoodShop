<?php
    class products_model extends Model
    {
        function ProductList() {
            $sql = "SELECT product_id, product_code, product_name FROM tbl_products WHERE IsDelete = 'N'";
            $res = $this->query($sql);
            return ($res);
        }


        function ProductSearchID($barcode) {
            $sql = "SELECT product_id, product_code, product_name ,tbl_unit.unit_name FROM tbl_products 
                    LEFT JOIN tbl_unit ON tbl_unit.unit_id = tbl_products.unit_id
                WHERE barcode='$barcode' AND tbl_products.IsDelete = 'N'";
            $res = $this->query($sql);
            return ($res);
        }

        function ProductSearchBarcode($barcode) {
            $sql = "SELECT product_id, product_code,barcode, product_name ,tbl_unit.unit_name , qty1, qty2 FROM tbl_products 
                    LEFT JOIN tbl_unit ON tbl_unit.unit_id = tbl_products.unit_id
                WHERE barcode='$barcode' AND tbl_products.IsDelete = 'N'";
            $res = $this->query($sql);
            return ($res);
        }


        function ProductNameById($product_id) {
            $sql = "SELECT product_id, product_code, product_name,tbl_unit.unit_name FROM tbl_products 
              LEFT JOIN tbl_unit ON tbl_unit.unit_id = tbl_products.unit_id
            WHERE product_id='$product_id' AND tbl_products.IsDelete = 'N'";
            $res = $this->query($sql);
            return ($res);
        }

        function ProductAdd($product_id, $receive_qty) {
            $create_user_id = $_SESSION["user_id"] ;
            $create_date =  date("Y-m-d h:i:s");
            $doc_date = date("Y-m-d h:i:s");
            $sql = "INSERT INTO tbl_product_receive (doc_date,product_id,receive_qty,create_user_id,create_date )
             VALUES ('$doc_date','$product_id','$receive_qty','$create_user_id','$create_date') 
            ";
            $res = $this->query($sql);
            return ($res);
        }

        function ProductCountAdd() {
            $create_user_id = $_SESSION["user_id"] ;
            $create_date =  date("Y-m-d h:i:s");
            $doc_date = date("Y-m-d");
            // print_r($_POST);
            $product_id = $_POST["product_id"];
            $product_qty = $_POST["product_qty"];
              $sql = "INSERT INTO tbl_product_count (doc_date,product_id,product_qty,create_user_id,create_date )
                     VALUES ('$doc_date','$product_id','$product_qty','$create_user_id','$create_date') 
            ";
            $res = $this->query($sql);
           return ($res);            
        }

        function ProductCountList() {
            
        }




    }


?>