<?php

namespace Controllers;

use Libs\Controller;
use Libs\Model;
use Models\LoginModel;

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $users = new LoginModel;
        $this->view->render('login/index', ["users" => $users->getUsers()]);
    }

    public function edit($params)
    {
        echo $params[0];
        //var_dump($params);
    }
}