<?php

class checkcard extends Controller { 

    function index() {
        if( $_SESSION['user_id']==''){
            $this->redirect('login');
          }
         $xcardno = @$_POST["card_no"];

         $model_data = $this->loadModel('card_model');
         $model_value = $model_data->login();


       
         $template = $this->loadView('cardvalue_view');
         $template->set('xValue', $xcardno);
 
         $template->render();
 
    }





}



?>