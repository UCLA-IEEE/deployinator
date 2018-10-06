<?php

require_once CORE . 'Controller.php';

class StatusController extends Controller
{
    /**
     * GET /status is the health check endpoint for this application
     */
    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $this->respond("success", "App is alive!");
        } else {
            $this->error();
        }
    }
}
