<?php
    class products_model extends Model
    {
        function ProductList() {
            $sql = "SELECT product_code, product_name FROM cnf_products WHERE delete_flag = 'N'";
            $res = $this->query($sql);
            return ($res);
        }

    }


?>