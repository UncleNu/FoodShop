<?php
    class login_model extends Model {


        function Login () {
            $email = $_POST["email"];
            // $pwd = md5($_POST["password_hash"]);
            $pwd =  ($_POST["password_hash"]);
            $sql = " SELECT * FROM cnf_user WHERE user_login = '$email' AND user_password = '$pwd'   ";
            $sql .= " AND user_level != 4 ";
                echo "<pre> $sql </pre> ";
                $res = $this->query($sql);
                echo "<pre>  $res </pre> ";
             //print_r ($res);

                $i=0;
                foreach ($res as $key_res => $value_res) {

                        $_SESSION['user_id'] = $value_res->user_id;
                        $_SESSION['user_level'] = $value_res->user_level;
                        $_SESSION['user_name'] = $value_res->user_name;
                        // $_SESSION['user_img'] = $value_res->user_img;
                        $i++;
                    }
echo "<pre> " . $value_res->username . "</pre> ";
                if ($i == 0) { $_SESSION['status_login']= '';}
                else {

                    $_SESSION['status_login'] = 'login';
                    $user_id = $_SESSION['user_id'];
                    $log_date = date("Y-m-d h:i:s");
                // log login
                $sql = "INSERT INTO log_login (user_id, log_date, log_status ) VALUES ('$user_id','$log_date','login') ";
                $res = $this->query($sql);

                // $sql = " UPDATE mt_user SET status_login = 1 where user_id = $user_id";
                // $res = $this->query($sql);
                }

           return $res;

        }


        function logout(){
            $_SESSION['status_login'] = 'logout';
            $user_id = $_SESSION['user_id'];
            $log_date = date("Y-m-d h:i:s");

            // $sql = "INSERT INTO log_login (user_id, log_date, log_status ) VALUES ('$user_id','$log_date','logout') ";
            // $res = $this->query($sql);
            // $sql = " UPDATE mt_user SET status_login = 0 where user_id = $user_id";
            // $res = $this->query($sql);
          //  return $res;
        }



    }
