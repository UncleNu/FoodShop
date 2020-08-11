<?php

class menu extends Controller {

        function index() {
            if( $_SESSION['user_id']==''){
                $this->redirect('login');
              }
            $tm = $this->loadView('menu_view');
            $tm->render();
        }

    }

?>