<?php

namespace Controllers;

use Libs\Errors;
use Libs\Session;
use Models\LoginModel;

class Login extends Session
{
    public function __construct($url)
    {
        parent::__construct($url);
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
            //var_dump($user);
            $this->initializate($user);
        } else {
            $this->redirect('', ["error" => Errors::ERROR_LOGIN_AUTH]);
        }
    }
}