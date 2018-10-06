<?php

/**
 * class App
 * When created, it attempts to split the request URI into multiple pieces.
 * After doing so, it delegates the rest of the requst to a controller.
 */
class App
{
    private $url_controller = null;
    private $url_action = null;
    private $url_params = array();

    // REGISTER CONTROLLERS HERE
    private $validControllers = array('status', 'deploy');

    /**
     * App constructor splits the request URI into multiple pieces and finds a controller
     * to delegate the rest of the work to
     */
    public function __construct()
    {
        $this->splitUrl(); // Splits the URI

        // Finds appropriate controller
        if (!$this->url_controller) {
            require_once CONTROLLERS . 'MainController.php';
            $mainController = new MainController;
            $mainController->render('index');
        } else if (file_exists(APP . 'controllers/' . ucfirst($this->url_controller) . 'Controller.php')) {
            $controllerName = ucfirst($this->url_controller) . 'Controller';
            require_once CONTROLLERS . $controllerName . '.php';
            $controller = new $controllerName();
            $controller->render($this->url_action);
        } else {
            require_once CONTROLLERS . 'ErrorController.php';
            $errorController = new ErrorController;
            $errorController->render('index');
        }
    }

    private function splitUrl()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        $validControllers = $this->validControllers;

        if (isset($url[0]) && in_array($url[0], $validControllers)) {
            $this->url_controller = $url[0];
        } else if (isset($url[0])) {
            $this->url_controller = 'main';
        } else {
            $this->url_controller = null;
        }

        if ($this->url_controller === 'main' && isset($url[0])) {
            $this->url_action = $url[0];
        } else if (isset($url[1])) {
            $this->url_action = $url[1];
        } else {
            $this->url_action = null;
        }

        if ($this->url_controller === 'main') {
            unset($url[0]);
        } else {
            unset($url[0], $url[1]);
        }

        $this->url_params = array_values($url);
    }
}
