<?php

class products extends Controller {



    function frmReceive()
    {
        $t = $this->loadView('productreceive_view');
        $t->render();
    }

    function actReceive()
    {
        $barcode =  $_POST["barcode"];
  
        $products = $this->loadModel('products_model');
        $product_data = $products->ProductSearchID($barcode);
        $t = $this->loadView('productreceive2_view');
        $t->set('product_data',$product_data);
        $t->render();
    }

    function actReceive2()
    {
        $product_id =  $_POST["product_id"];
        $receive_qty =  $_POST["receive_qty"];
  
        $products = $this->loadModel('products_model');
        $product_data = $products->ProductAdd($product_id ,$receive_qty  );
        // $t = $this->loadView('productreceive2_view');
        // $t->set('product_data',$product_data);
        $this->redirect('admin/index/productreceive');
    }

function ProductCount(){
    
}



    function CheckCountList(){
        $products=$this->loadModel('products_model');
        $product_data = $products->productlist();
        $t = $this->loadView('productCount_view');
        $t->set('product_data',$product_data);
        $t->render();
    }


    function CheckStockFrm($x_product_id){

        $products = $this->loadModel('products_model');
        $product_data = $products->ProductNameById($x_product_id);
        $t = $this->loadView('productCountFrm_view');
        $t->set('product_id',$x_product_id);
        $t->set('product_data',$product_data);
        $t->render();
    }

    function CheckStockAction(){
        // print_r($_POST);
        $products = $this->loadModel('products_model');
        $products_data = $products->ProductCountAdd();
         $this->redirect('products/CheckCountList');
    }


}


?>