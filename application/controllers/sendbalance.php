<?php
class sendbalance extends Controller {
    function index() { 
        $template = $this->loadView('SendBalanceFrm_view');
        $template->render();
    }

    function act() {
        $xDD1 = $_POST["d1"];
        $xDD2 = $_POST["d2"];
        $xTT1 = $_POST["t1"];
        $xTT2 = $_POST["t2"];


        $xd1 = $xDD1 . " " . $xTT1;
        $xd2 = $xDD2 . " " . $xTT2;

        $rpt = $this->loadModel('sendbalance_model');
        $rpt_data = $rpt->call_sale_price($xd1,$xd2);
        $sale_data = $rpt->sum_emp_sale($xd1,$xd2);
        $station_data = $rpt->sum_station_sale($xd1,$xd2);
        $type_data = $rpt->sum_type_sale($xd1,$xd2);
        $template = $this->loadView('SendBalance2Frm_view');

        $template->set('rpt_data', $rpt_data);
        $template->set('sale_data', $sale_data);
        $template->set('station_data', $station_data);
        $template->set('type_data', $type_data);
        $template->set('xd1', $xd1);    
        $template->set('xd2', $xd2);    
        $template->render();

    }

function act2(){

    $xd1 = $_POST["d1"];
    $xd2 = $_POST["d2"];

    $ln = BASE_URL . "sendbalance/sendbalance_print?d1=$xd1&d2=$xd2";
    $rpt = $this->loadModel('sendbalance_model');
    $rpt->insert_data();
    $this->redirect('admin/index/sendbalance');
   
}

function sendbalance_print($id){

    
    $rpt = $this->loadModel('sendbalance_model');
    $send_data = $rpt->call_data($id);   
    $template = $this->loadView('SendBalancePrint_view');
    // $template->set('rpt_data', $rpt_data);
    $template->set('send_data', $send_data);
 
    $template->render();

}



}
?>