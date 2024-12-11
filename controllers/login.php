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
        $this->view->render('login/index');
    }

    public function auth()
    {
        if (!$this->existPOST(['email', 'password'])) {
            $this->redirect('', []);
        }

    }
}