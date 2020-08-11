<?php
class reports extends Controller
{
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
}
