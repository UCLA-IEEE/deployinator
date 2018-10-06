<?php

$requestMethod = $_SERVER["REQUEST_METHOD"];
$requestURI = $_SERVER["REQUEST_URI"];

/**
 * POST /deploy is the deploy webhook that runs git pull in
 * local repositories
 */
if ($requestMethod === "POST" && $requestURI === "/deploy") {
    chdir("../echo");
    print(shell_exec("git pull"));
}

/**
 * GET /status is the health check endpoint to see if this
 * server is even working.
 */
if ($requestMethod === "GET" && $requestURI === "/status") {
    print("App is alive!");
}
