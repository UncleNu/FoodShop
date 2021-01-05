<?php

class dashboard extends Controller
{
    function index()
    {
        $date1 = date("Y-m-d");
        $date2 = date("Y-m-d");
        $mm = date("m");
        $dashboard = $this->loadModel('dashboard_model');
        $saleTopDay = $dashboard->SaleTopDay($date1);
        $saleTopMonth = $dashboard->SaleTopMonth($mm);

        $saleToDay = $dashboard->SaleToday($date1);
        $saleToMonth = $dashboard->SaleMonth($mm);
 
        $countMember = $dashboard->CountMember();

        $memberTopToday = $dashboard->MemberTopToday($date1);
        $memberTopMonth = $dashboard->MemberTopMonth($mm);


        $template = $this->loadView('dashboard_view');
        $template->set('saleTopDay', $saleTopDay);
        $template->set('saleTopMonth', $saleTopMonth);
        $template->set('saleToDay', $saleToDay);
        $template->set('saleToMonth', $saleToMonth);
        $template->set('countMember', $countMember);
        $template->set('memberTopToday', $memberTopToday);
        $template->set('memberTopMonth', $memberTopMonth);


        $template->render();
    }
}
