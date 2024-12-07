<?php

namespace Controllers;

use Libs\Controller;

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('login/index');
    }

    public function edit($params)
    {
        echo $params[0];
        //var_dump($params);
    }
}