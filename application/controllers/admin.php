<?php
class admin extends Controller {
  private $title;
  private $db;
  public function __construct()
  {
    $this->db = $this->loadModel('database');
    $this->loadHelper('setting')->get($this->db);
    if(isset($_SESSION['adminlogin']['id'])){
      $this->datauser = $this->db->table(DB_PREFIX.'useradmin')->where('`id` = \''.$_SESSION['adminlogin']['id'].'\'')->limit('1')->find();
    }else{
      $this->datauser = null;
    }
  }

  public function loginchk()
  {
    $this->datauser = $this->db->table(DB_PREFIX.'useradmin')->where('`username` = \''.$_POST['log'].'\' AND `password` = \''.$_POST['pwd'].'\'')->limit('1')->find();
    if($this->datauser){
      $_SESSION['adminlogin']['id'] = $this->datauser[0]->id;
      $this->redirect('admin/index');
    }else{
      $_SESSION['adminlogin']['id'] = null;
      $this->redirect('admin/index/login');
    }
  }

  public function logout()
  {
    $_SESSION['user_id'] = null;
    $this->redirect(BASE_URL.'login');
  }

  function index($page_view='index'){
    if( $_SESSION['user_id']==''){
     echo " User ID : ". $_SESSION['user_id'];  
     // $this->redirect('login');
    } else {
      $t = $this->loadView('cope/index');

      $this->incModel('xcrud/xcrud');
      $xcrud = Xcrud::get_instance();
      $t->set('xcrud',$xcrud);
      // if($this->datauser == null){
      //   $page_view = 'login';
      //   $t->set('page_view','login');
      // }else{
      //   $t->set('page_view',$page_view);
      // }
      $t->set('page_view',$page_view);
      $t->render();
    }
 
  }

  function wp($page_view='index'){
    $t = $this->loadView('cope/index_wp');
    $this->incModel('xcrud/xcrud');
    $xcrud = Xcrud::get_instance();
    $t->set('xcrud',$xcrud);
    $t->set('page_view',$page_view);
    $t->render();
  }

}
