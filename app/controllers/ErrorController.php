<?php

require_once CORE . 'Controller.php';

class ErrorController extends Controller
{
    public function index()
    {
        require_once VIEWS . 'error/error.php';
    }
}
