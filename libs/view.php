<?php

namespace Libs;

class View
{
    public $d;

    public function render($name, $data = [])
    {
        $this->d = $data;
        $this->handleMessages();    
        require_once "views/$name.php";
        exit;
    }

    public function handleMessages()
    {
        if (isset($_GET['success']) && isset($_GET['success'])) {
            #Nothing
        } elseif (isset($_GET['success'])) {
            $this->handleSuccess();
        } elseif (isset($_GET['error'])) {
            $this->handleError();
        }
    }

    public function handleSuccess()
    {

    }

    public function handleError()
    {

    }
}