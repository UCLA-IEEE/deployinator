<?php

class Controller
{
    public function render($action)
    {
        if ((!isset($action) || $action === '') && method_exists($this, 'index')) {
            $this->index();
        } else if (isset($action) && method_exists($this, $action)) {
            $this->$action();
        } else {
            $this->error();
        }
    }

    public function respond($status, $message)
    {
        header('Content-Type: application/json');
        print json_encode(array(
            "status" => $status,
            "message" => $message,
        ));
    }

    public function error()
    {
        require_once CONTROLLERS . 'ErrorController.php';
        $errorController = new ErrorController;
        $errorController->render('index');
    }
}
