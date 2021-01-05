<?php
class reports extends Controller
{

// ===================== รายงานการรับสินค้าเข้า ============================
    function rptReceive() {

        $xDate1 =  @$_POST["d1"];
        $xDate2 =  @$_POST["d2"];
    
        $xSalerId =  @$_POST["saler_id"];

        $Saler = $this->loadModel('saler_model');
        $salerlist = $Saler->salerlist();
        $template = $this->loadView('rptReceiveFrm_view');
        $template->set('xDate1', $xDate1);
        $template->set('xDate2', $xDate2);
     


        $template->set('xSalerId', $xSalerId);
        $template->set('salerlist', $salerlist);
        $template->render();
    }

    function rptReceiveList() {
        $xDate1 =  @$_POST["d1"];
        $xDate2 =  @$_POST["d2"];
        $xTime1 =  @$_POST["t1"];
        $xTime2 =  @$_POST["t2"]; 
        $xSalerId =  @$_POST["saler_id"];
        $rpt = $this->loadModel('reports_model');
        $rpt_data = $rpt->rptReceive($xDate1,$xDate2,$xSalerId);
        $saler = $this->loadModel('saler_model');
        $saler_name = $saler->salername($xSalerId);
        $template = $this->loadView('rptReceive_view');
        $template->set('xDate1', $xDate1);
        $template->set('xDate2', $xDate2);
      
        $template->set('xSalerId', $xSalerId);
        $template->set('saler_name', $saler_name);
        $template->set('rpt_data', $rpt_data);    
        $template->render();
    }

// ===================== รายงานการขาย ============================
function rptSaleDetail() {

    $xDate1 =  @$_POST["d1"];
    $xDate2 =  @$_POST["d2"];
    $xTime1 =  @$_POST["t1"];
    $xTime2 =  @$_POST["t2"];   
    $xProductId =  @$_POST["product_id"];

    $products = $this->loadModel('products_model');
    $product_data = $products->productlist();
    $template = $this->loadView('rptSaleDetailFrm_view');
    $template->set('xDate1', $xDate1);
    $template->set('xDate2', $xDate2);
    $template->set('xTime1', $xTime1);
    $template->set('xTime2', $xTime2);
    $template->set('xProductId', $xProductId);
    $template->set('productlist', $product_data);
    $template->render();
}

function rptSaleDetailList() {
    $xDate1 =  @$_POST["d1"];
    $xDate2 =  @$_POST["d2"];
    $xTime1 =  @$_POST["t1"];
    $xTime2 =  @$_POST["t2"];   

$dt1 = $xDate1 . " " . $xTime1;
$dt2 = $xDate2 . " " . $xTime2;

    $xProductId =  @$_POST["product_id"];

    $rpt = $this->loadModel('reports_model');
    $rpt_data = $rpt->rptSaleDetail($dt1,$dt2,$xProductId);
    $product = $this->loadModel('products_model');
    $product_name = $product->ProductNameById($xProductId);
    $template = $this->loadView('rptSaleDetail_view');
    $template->set('xDate1', $xDate1);
    $template->set('xDate2', $xDate2);
    $template->set('xTime1', $xTime1);
    $template->set('xTime2', $xTime2);
    $template->set('xProductId', $xProductId);
    $template->set('product_name', $product_name);
    $template->set('rpt_data', $rpt_data);    
    $template->render();
}

// ===================== รายงานการขาย ฝากขาย ============================

function rptSale2Detail() {

    $xDate1 =  @$_POST["d1"];
    $xDate2 =  @$_POST["d2"];
    $xTime1 =  @$_POST["t1"];
    $xTime2 =  @$_POST["t2"];   
    $xProductId =  @$_POST["product_id"];

    $products = $this->loadModel('products_model');
    $product_data = $products->productlist();
    $template = $this->loadView('rptSale2DetailFrm_view');
    $template->set('xDate1', $xDate1);
    $template->set('xDate2', $xDate2);
    $template->set('xTime1', $xTime1);
    $template->set('xTime2', $xTime2);
    $template->set('xProductId', $xProductId);
    $template->set('productlist', $product_data);
    $template->render();
}


function rptSale2DetailList() {
    $xDate1 =  @$_POST["d1"];
    $xDate2 =  @$_POST["d2"];
    $xTime1 =  @$_POST["t1"];
    $xTime2 =  @$_POST["t2"];   

$dt1 = $xDate1 . " " . $xTime1;
$dt2 = $xDate2 . " " . $xTime2;

    $xProductId =  @$_POST["product_id"];

    $rpt = $this->loadModel('reports_model');
    $rpt_data = $rpt->rptSale2Detail($dt1,$dt2,$xProductId);
    $product = $this->loadModel('products_model');
    $product_name = $product->ProductNameById($xProductId);
    $template = $this->loadView('rptSale2Detail_view');
    $template->set('xDate1', $xDate1);
    $template->set('xDate2', $xDate2);
    $template->set('xTime1', $xTime1);
    $template->set('xTime2', $xTime2);
    $template->set('xProductId', $xProductId);
    $template->set('product_name', $product_name);
    $template->set('rpt_data', $rpt_data);    
    $template->render();
}


// ===================== รายงานการขาย แบบละเอียด ============================

function rptSale() {

    $xDate1 =  @$_POST["d1"];
    $xDate2 =  @$_POST["d2"];
    $xTime1 =  @$_POST["t1"];
    $xTime2 =  @$_POST["t2"];   
    $xProductId =  @$_POST["product_id"];

    $products = $this->loadModel('products_model');
    $product_data = $products->productlist();
    $template = $this->loadView('rptSaleFrm_view');
    $template->set('xDate1', $xDate1);
    $template->set('xDate2', $xDate2);
    $template->set('xTime1', $xTime1);
    $template->set('xTime2', $xTime2);
    $template->set('xProductId', $xProductId);
    $template->set('productlist', $product_data);
    $template->render();
}

function rptSaleList() {
    $xDate1 =  @$_POST["d1"];
    $xDate2 =  @$_POST["d2"];
    $xTime1 =  @$_POST["t1"];
    $xTime2 =  @$_POST["t2"];   
    $dt1 = $xDate1 . " " . $xTime1;
    $dt2 = $xDate2 . " " . $xTime2;

    $rpt = $this->loadModel('reports_model');
    $rpt_data = $rpt->rptSale($dt1,$dt2);
    $product = $this->loadModel('products_model');
 
    $template = $this->loadView('rptSale_view');
    $template->set('xDate1', $xDate1);
    $template->set('xDate2', $xDate2);
    $template->set('xTime1', $xTime1);
    $template->set('xTime2', $xTime2);
    $template->set('rpt_data', $rpt_data);    
    $template->render();
}




    // ================================  report by brand ================================
    function rStoreBrandFrm()
    {
        $template = $this->loadView('rStoreBrandFrm_view');
        $template->render();
    }

    function rStoreBrand()
    {
        $xDate1 =  $_POST["xDate1"];
        $xDate2 =  $_POST["xDate2"];
// echo "<pre> $xDate1 - $xDate2 </pre>";

        $rptData = $this->loadModel('reports_model');
        $rptValue = $rptData->SumStoreByBrand($xDate1, $xDate2);
        $template = $this->loadView('rStoreBrand_view');
        $template->set('rStoreBrand', $rptValue);
        $template->set('xDate1', $xDate1);
        $template->set('xDate2', $xDate2);
        
        $template->render();
    }

    // ================================  report by product code ================================

    function rStoreProductCodeFrm()
    {
        $template = $this->loadView('rStoreProductCodeFrm_view');
        $template->render();
    }
    function rStoreProductCode()
    {
        $xDate1 =  $_POST["xDate1"];
        $xDate2 =  $_POST["xDate2"];
// echo "<pre> $xDate1 - $xDate2 </pre>";

        $rptData = $this->loadModel('reports_model');
        $rptValue = $rptData->SumStoreByProductCode($xDate1, $xDate2);
        $template = $this->loadView('rStoreProductCode_view');
        $template->set('rStoreProductCode', $rptValue);
        $template->set('xDate1', $xDate1);
        $template->set('xDate2', $xDate2);
        
        $template->render();
    }

    // ================================  report by group  ================================

    function rGroupStoreMonth()
    {
        $xyear = "2019";
        $xmonth = "06";
        $ProductData = $this->loadModel('products_model');
        $ProductValue = $ProductData->ProductList();
        $rptData = $this->loadModel('reports_model');
        $rptValue = $rptData->GroupStoreByMonth($xyear,$xmonth);
        $template = $this->loadView('rGroupMonth_view');
        $template->set('rptValue', $rptValue);
        $template->set('ProductValue', $ProductValue);

        $template->set('xyear', $xyear);
        $template->set('xmonth', $xmonth);
        $template->render();
    }



    // ================================  report balance stock  ================================

    function rStockBalance(){

        $rptData = $this->loadModel('reports_model');
        $rptValue = $rptData->rptStockBalance();
        $template = $this->loadView('rStockBalance_view');
        $template->set('rptValue', $rptValue);       
        $template->render();
    }


    // ================================  report sale group by type  ================================

    function rSaleGroupTypeFrm()
    {
        $template = $this->loadView('rSaleGroupTypeFrm_view');
        $template->render();
    }

    function rSaleGroupType(){
        $xDate1 =  @$_POST["d1"];
        $xDate2 =  @$_POST["d2"];

        $rptData = $this->loadModel('reports_model');
        $rptValue = $rptData->rptSaleByType($xDate1,$xDate2);

        $template = $this->loadView('rSaleGroupType_view');
        $template->set('rptValue', $rptValue);
        $template->set('xDate1', $xDate1);
        $template->set('xDate2', $xDate2);
        $template->render();

    }






    function rStockBalanceWH(){

        $rptData = $this->loadModel('reports_model');
        $rptValue = $rptData->rptStockBalanceWH();
        $template = $this->loadView('rStockBalanceWH_view');
        $template->set('rptValue', $rptValue);
        $template->render();
    }





}