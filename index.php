<?php

$requestMethod = $_SERVER["REQUEST_METHOD"];
$requestURI = $_SERVER["REQUEST_URI"];

$repoToDir = array(
    "ieeebruins.com" => "ieeebruins-production",
    "deployinator" => "deployinator",
);

// Get request body and decode it into an object
$json_str = file_get_contents('php://input');
$reqBody = json_decode($json_str);
print_r($reqBody);
print($reqBody->repository->name);

/**
 * POST /deploy is the deploy webhook that runs git pull in
 * local repositories
 */
if ($requestMethod === "POST" && $requestURI === "/deploy") {
    $repoName = $reqBody->repository->name;
    print($repoName);
    chdir("../" . $repoToDir[$repoName]);
    print(shell_exec("git pull"));
}

/**
 * GET /status is the health check endpoint to see if this
 * server is even working.
 */
if ($requestMethod === "GET" && $requestURI === "/status") {
    print("App is alive!");
}
