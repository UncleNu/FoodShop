<?php
class cardvalue extends Controller   {


    function frm()
    {
        $template = $this->loadView('frmCardvalue_view');
        $template->render();
    }

    function frm1($card_type_id)
    {
        $template = $this->loadView('frmCardvalue_view');
        $template->set('card_type_id', $card_type_id);
        $template->render();
    }
    function frm2($card_type_id)
    {
        $template = $this->loadView('frmCardvalue2_view');
        $template->set('card_type_id', $card_type_id);
        $template->render();
    }

    function insert_value(){
        $x_card_type_id = $_POST["card_type_id"];
        $x_card_value = $_POST["card_value"];
        $x_card_expire = $_POST["card_expire"];

        $xData = $this->loadModel('cardvalue_model');
        $xValue = $xData->cardvalue($x_card_value, $x_card_type_id, $x_card_expire);

        $template = $this->loadView('cardvalue_view');
        $template->set('xValue', $xValue);

        $template->render();


    }
    



}


?>