<?php

namespace Libs;

use Controllers\Errors;
use Libs\Controller;

class Session extends Controller
{
    public $permissions;
    public $defaultSite;
    public $url;
    public $userId;
    public $userType;
    public $userName;

    public function __construct($url)
    {
        if (session_status() == PHP_SESSION_NONE) session_start();

        $this->url = $url;
        $this->permissions = $this->permissions();
        $this->defaultSite = 'main';

        /*
        * 1 => invitado
        * 2 => user
        * 3 => admin
        */
        
        $this->userId = $_SESSION['userId' ?? ''];
        $this->userType = $_SESSION['userTypr' ?? 1];
        $this->userName = $_SESSION['userName' ?? ''];

        parent::__construct();
    }

    public function permissions()
    {
        return [
            "1" => [
                'login',
            ],
            "1" => [
                'main', 'logout', 'user',
            ],
            "3" => [
                'main', 'logout', 'user', 'typeuser',
            ],
        ];
    }

    public function validateSession()
    {
        if ($this->existSession()) {
            if(!$this->isAuthorized($this->url, $this->userType)) {
                $this->redirect($this->defaultSite);
            }
        } else {
            if(!$this->isAuthorized($this->url, $this->userType)) {
                new Errors;
            }
        }
    }

    public function existSession()
    {
        return isset($_SESSION['userId']);
    }

    public function isAuthorized($permission, $userType)
    {
        return in_array($permission, $this->permissions[$userType]);
    }

    public function initializate($user)
    {
        $_SESSION['userId'] = $user['id'];
        $_SESSION['userType'] = $user['type_user_id'];
        $_SESSION['userName'] = $user['name'];

        $this->redirect($this->defaultSite);
    }

    public function logout()
    {
        session_unset();
        session_destroy();

    }
}