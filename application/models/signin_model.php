<?php
class signin_model extends Model
{



    function signin()
    {

        //$this->db = $this->loadModel('database');


        $email = $_POST["email"];
        $pwd = $_POST["password"];
        $_SESSION['status'] = "login";
        // $_SESSION['uid'] = "xxx";
        // $_SESSION['uid2'] = "zzz";


        $sql = " SELECT * FROM mt_members WHERE member_email = '$email' AND member_password = '$pwd' ";
        $sql .= "";
        $res = $this->query($sql);


        $_SESSION['member_id'] = $res['0']->member_id;

        if ($_SESSION['member_id'] == '') {
            $_SESSION['status'] = "";
        } else {
            $_SESSION['status'] = "login";
            $_SESSION['member_email'] = $res['0']->member_email;

            $_SESSION['member_email'] = $email;
            $_SESSION['member_Display_Name'] = $res['0']->member_Display_Name;



            // $user = $this->db->table(DB_PREFIX.'mt_members')->where('`member_email` = \''.$_POST['email'].'\' AND `member_password` = \''.$_POST['password'].'\'')->limit('1')->find();
            // if($user === false){
            //   $_SESSION['login_error'] = "";
            //     $this->redirect('singin');
            // }else{

            //   $_SESSION['login']['name'] = $user['0']->member_Display_Name ;
            //   $_SESSION['login']['id'] = $user['0']->member_email;
            //   $this->redirect('profile');
            // }






        }
    }
}
