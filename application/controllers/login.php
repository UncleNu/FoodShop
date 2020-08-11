<?php

class login extends Controller
{
    private $title;
    private $db;

    public function __construct()
    {
        $this->title = "xxxxx";
        $this->db = $this->loadModel('database');
        $this->loadHelper('setting')->get($this->db);
    }

    public function setlang($lang = 'th')
    {
        unset ($_COOKIE ["lang"]);
        $lang = substr(strip_tags(trim($lang)), 0, 2);
        $_SESSION ['lang'] = $lang;
        $_COOKIE ["lang"] = $lang;
        setcookie('lang', $lang, time() + (3600 * 24 * 30));
    }

    function index()
    {

        $t = $this->loadView('login_view');
        $t->set('title', $this->title);
        $t->set('get', $this->db);
        $t->set('thisis', $this);
        $t->render();
    }

    function s($Subject, $messages, $toemail, $name)
    {
        $mail = $this->loadModel('PHPMailer');
        $mail->FromName = SEND_EMAIL_FROM_NAME;
        $mail->Subject = $Subject;

        $mail->Body = $messages;

        $mail->AddAddress($toemail, $name);
        $mail->AddCC(SEND_EMAIL_CC, SEND_EMAIL_FROM_NAME);
        $mail->set('X-Priority', '1');
        if (!$mail->send()) {
            return _LANG_228_ . ' (' . $mail->ErrorInfo . ')';
        } else {
            return _LANG_226_ . ' ' . $toemail . ' ' . $name . ' ' . _LANG_227_;
        }
        $mail->ClearAllRecipients();
        $mail->SmtpClose();
    }


    public function logout()
    {
        $lgdata = $this->loadModel('login_model');
        $lgValue = $lgdata->logout();
        unset($_SESSION['login']);
        session_destroy();
        $this->redirect('login');
    }

    public function act()
    {


        $lgdata = $this->loadModel('login_model');
        $lgValue = $lgdata->login();

        $tp = $this->loadView('main_view');
        $tp->set('lgValue', $lgValue);
        if ($_SESSION['status_login'] == 'login') {
            $this->redirect('dashboard');
        } else {
            $this->redirect('login/logout');
        }
        // $tp->render();

    }



}
