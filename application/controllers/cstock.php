<?php

class cstock extends Controller {


    function index() {
        $template = $this->loadView('cstock1_view');
        // $template->set('someval', $something);
        $template->render();
    }


    function cstockfrm(){
        $x_barcode = $_POST["barcode"];
        $product = $this->loadModel('products_model');
        $product_data = $product->ProductSearchBarcode($x_barcode);      
        
        $sale = $this->loadModel('sale_model');
        $sale_data = $sale->sum_sale($x_barcode);
        $rc = $this->loadModel('receive_model');
        $rc_data     = $rc->RcToday($x_barcode);

        $template = $this->loadView('cstockfrm_view');
        $template->set('product_data', $product_data);
        $template->set('sale_data', $sale_data);
        $template->set('rc_data', $rc_data);
        $template->render();

    }


function cstockact(){
    echo "<pre> " . print_r( $_POST) . "</pre>";
echo "barcode = " . $_POST["barcode"];
    $rpt = $this->loadModel('receive_model');
    $rpt->RcInsert();
    $this->redirect('cstock'); 
}




}


?>