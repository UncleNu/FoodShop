<?php
    class saler_model extends Model {
        function salerlist()
        {
            $sql = "SELECT *  FROM tbl_saler  ";
            $sql .= " WHERE  IsActive = 'Y' AND IsDelete = 'N' ";
            // echo "<pre> $sql </pre> ";
            $rs = $this->query($sql);
            return ($rs);
        }

        function salername($saler_id)
        {
                    if ($saler_id != ""){
                        $sql = "SELECT saler_name  FROM tbl_saler  ";
                        $sql .= " WHERE saler_id = '$saler_id' AND  IsActive = 'Y' AND IsDelete = 'N' ";
                        //  echo "<pre> $sql </pre> ";
                        $rs = $this->query($sql);   
                    } else {
                        $rs = "ALL";
                    }

            return ($rs);
        }
    }

?>