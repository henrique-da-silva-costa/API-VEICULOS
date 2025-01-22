<?php

function carregar(string $controller, string $acao)
{
    try {
        $controllerNameScape = "app\\Controllers\\{$controller}";

        if (!class_exists($controllerNameScape)) {
            return print_r(json_encode(["erro" => TRUE, "msg" => "Classe não encontrada"]));
        }

        $controllerInstancia = new $controllerNameScape;

        if (!method_exists($controllerNameScape, $acao)) {
            return print_r(json_encode(["erro" => TRUE, "msg" => "Metodo não encontrado"]));
        }

        $controllerInstancia->$acao();
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
}

$routes = [
    //Carro
    "GET" => [
        "/carro" => fn() => carregar("Carro", "todos"),
        "/carro/unico" => fn() => carregar("Carro", "pegarPorId")
    ],

    "POST" => [
        "/carro/cadastrar" => fn() => carregar("Carro", "cadastrar"),
        "/carro/editar" => fn() => carregar("Carro", "editar")
    ],

    "DELETE" => [
        "/carro/excluir" => fn() => carregar("Carro", "excluir"),
    ],

    //MOTO
    "GET" => [
        "/moto" => fn() => carregar("Moto", "todos"),
        "/moto/unico" => fn() => carregar("Moto", "pegarPorId")
    ],

    "POST" => [
        "/moto/cadastrar" => fn() => carregar("Moto", "cadastrar"),
        "/moto/editar" => fn() => carregar("Moto", "editar")
    ],

    "DELETE" => [
        "/moto/excluir" => fn() => carregar("Moto", "excluir"),
    ],

    //CAMINHÃO
    "GET" => [
        "/caminhao" => fn() => carregar("Caminhao", "todos"),
        "/caminhao/unico" => fn() => carregar("Caminhao", "pegarPorId")
    ],

    "POST" => [
        "/caminhao/cadastrar" => fn() => carregar("Caminhao", "cadastrar"),
        "/caminhao/editar" => fn() => carregar("Caminhao", "editar")
    ],

    "DELETE" => [
        "/caminhao/excluir" => fn() => carregar("Caminhao", "excluir"),
    ]
];
