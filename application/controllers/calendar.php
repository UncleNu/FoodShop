<?php

class calendar extends Controller
{
    function index()
    {
      $xMonth = $_GET['month'];
      $xYear = $_GET['year'];
      $template = $this->loadView('calendar_view');
      $template->set('xmonth', $xMonth);
      $template->set('xyear', $xYear);
      $template->render();
    }

  }

  ?>
