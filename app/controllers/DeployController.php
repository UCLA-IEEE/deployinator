<?php

require_once CORE . 'Controller.php';

class DeployController extends Controller
{
    // Mapping from repository names to their directory names
    private $repoToDir = array(
        "ieeebruins.com" => "ieeebruins-production",
        "deployinator" => "deployinator",
        "gb-family-tree" => "gb-family-tree-prod",
    );


    /**
     * POST /deploy will cd into the appropriate directory
     * and run "git pull"
     */
    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Get request body and decode it into an object
            $json_str = file_get_contents('php://input');
            $reqBody = json_decode($json_str);

            // cd into repo and run git pull
            $repoName = $reqBody->repository->name;
            chdir("../" . $this->repoToDir[$repoName]);
            shell_exec("git pull");

            $this->respond("success", "whee");
        } else {
            $this->error(); // Redirect to ErrorController's error function
        }
    }
}
