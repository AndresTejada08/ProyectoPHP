<?php

namespace Controllers;

use Libs\Controller;
use Libs\Errors;
use Libs\Model;
use Libs\Success;
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
        //var_dump($_POST);
        if (!$this->existPOST(['email', 'password'])) {
            $this->redirect('login', ["error" => Errors::ERROR_LOGIN_AUTH_EMPTY]);
        }
        
        $login = new LoginModel();
        $user = $login->login($_POST['email'], $_POST['password']);

        if ($user != null) {
            var_dump($user);
        } else {
            $this->redirect('', ["error" => Errors::ERROR_LOGIN_AUTH]);
        }
    }
}