<?php
class saler extends Controller { 

    function index() {
        if( $_SESSION['user_id']==''){
            $this->redirect('login');
          }
        $tm = $this->loadView('menu_view');
        $tm->render();
    }

    function list() {
        $tm = $this->loadView('saler_view');
        $tm->render();
    }



}


?>