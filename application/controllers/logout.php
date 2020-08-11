<?php

class logout extends Controller
{

    function index()
    {
        session_destroy();
        $t = $this->loadView('logout');

        $t->render();
        // $t->redirect('/');
    }

}


?>