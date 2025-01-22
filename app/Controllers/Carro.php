<?php

namespace app\Controllers;

use app\Controllers\Veiculo;
use app\Models\Carro as modelCarro;

class Carro extends Veiculo
{
    public $carro;
    public $requisicao;

    public function __construct()
    {
        $this->carro = new modelCarro;
        $this->requisicao = $_REQUEST;
    }

    public function todos()
    {
        return print_r(json_encode($this->carro->todos()));
    }

    public function pegarPorId()
    {
        $id = isset($this->requisicao["id"]) ? $this->requisicao["id"] : NULL;

        return print_r(json_encode($this->carro->pegarPorId($id)));
    }

    public function cadastrar()
    {
        if (self::validar($this->requisicao)) {
            return;
        }

        $existe = $this->carro->exsite($this->requisicao);

        if ($existe) {
            return print_r(json_encode(["erro" => TRUE, "msg" => "Carro já existe"]));
        }

        $cadastrar = $this->carro->cadastrar($this->requisicao);

        if ($cadastrar->erro) {
            return print_r(json_encode(["erro" => TRUE, "msg" => $cadastrar->msg]));
        }

        return print_r(json_encode(["erro" => FALSE]));
    }

    public function editar()
    {
        if (Validacao::validar($this->requisicao)) {
            return;
        }

        $existe = $this->carro->exsite($this->requisicao);

        if ($existe) {
            return print_r(json_encode(["erro" => TRUE, "msg" => "Carro já existe"]));
        }

        $cadastrar = $this->carro->editar($this->requisicao);

        if ($cadastrar->erro) {
            return print_r(json_encode(["erro" => TRUE, "msg" => $cadastrar->msg]));
        }

        return print_r(json_encode(["erro" => FALSE]));
    }

    public function excluir()
    {
        $id = isset($this->requisicao["id"]) ? $this->requisicao["id"] : NULL;

        if (!is_numeric($id)) {
            return print_r(json_encode(["erro" => TRUE, "msg" => "Carro não encontrado"]));
        }

        $cadastrar = $this->carro->excluir($this->requisicao);

        if ($cadastrar->erro) {
            return print_r(json_encode(["erro" => TRUE, "msg" => $cadastrar->msg]));
        }

        return print_r(json_encode(["erro" => FALSE]));
    }
}
