<?php

class dashboard extends Controller
{
    function index()
    {
        $date1 = date("Y-m-d");
        $date2 = date("Y-m-d");

        // $QtData = $this->loadModel('qt_model');
        // $QtValue = $QtData->QtSumData($date1, $date2);
        // $QtCmtType1 = $QtData->QtSumCustomerType($date1, $date2, 1);
        // $QtCmtType2 = $QtData->QtSumCustomerType($date1, $date2, 2);
        // $QtPrice = $QtData->QtPrice($date1, $date2);
        // $QtCar = $QtData->QtCountCar($date1, $date2);


        // $RcData = $this->loadModel('receive_model');
        // $RcSumQTY = $RcData->RcSumQTY($date1, $date2);
        // $RcSumPrice = $RcData->RcSumPrice($date1, $date2);


        // $template = $this->loadView('dashboard_view');
        // $template->set('QtSum', $QtValue);
        // $template->set('QtCmtType1', $QtCmtType1);
        // $template->set('QtCmtType2', $QtCmtType2);
        // $template->set('QtPrice', $QtPrice);
        // $template->set('QtCar', $QtCar);

        // $template->set('RcSumQTY', $RcSumQTY);
        // $template->set('RcSumPrice', $RcSumPrice);


        $template = $this->loadView('dashboard_view');
        $template->render();
    }
}
