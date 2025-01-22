<?php

require("../vendor/autoload.php");
require("../routes/router.php");

try {
    $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
    $request = $_SERVER["REQUEST_METHOD"];

    if (!isset($routes[$request])) {
        print_r(json_encode(["erro" => TRUE, "msg" => "A rota não existe"]));
    }


    if (!array_key_exists($uri, $routes[$request])) {
        print_r(json_encode(["erro" => TRUE, "msg" => "A rota não existe"]));
    }

    $controller = $routes[$request][$uri];
    $controller();
} catch (\Throwable $th) {
    echo $th->getMessage();
}
