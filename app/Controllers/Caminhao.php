<?php

namespace app\Controllers;

use app\Controllers\Veiculo;
use app\Models\Caminhao as modelCaminhao;

class Caminhao extends Veiculo
{
    public $caminhao;
    public $requisicao;

    public function __construct()
    {
        $this->caminhao = new modelCaminhao;
        $this->requisicao = $_REQUEST;
    }

    public function todos()
    {
        return print_r(json_encode($this->caminhao->todos()));
    }

    public function pegarPorId()
    {
        $id = isset($this->requisicao["id"]) ? $this->requisicao["id"] : NULL;

        return print_r(json_encode($this->caminhao->pegarPorId($id)));
    }

    public function cadastrar()
    {
        if (self::validar($this->requisicao)) {
            return;
        }

        $existe = $this->caminhao->exsite($this->requisicao);

        if ($existe) {
            return print_r(json_encode(["erro" => TRUE, "msg" => "Caminhão já existe"]));
        }

        $cadastrar = $this->caminhao->cadastrar($this->requisicao);

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

        $existe = $this->caminhao->exsite($this->requisicao);

        if ($existe) {
            return print_r(json_encode(["erro" => TRUE, "msg" => "Caminhão já existe"]));
        }

        $cadastrar = $this->caminhao->editar($this->requisicao);

        if ($cadastrar->erro) {
            return print_r(json_encode(["erro" => TRUE, "msg" => $cadastrar->msg]));
        }

        return print_r(json_encode(["erro" => FALSE]));
    }

    public function excluir()
    {
        $id = isset($this->requisicao["id"]) ? $this->requisicao["id"] : NULL;

        if (!is_numeric($id)) {
            return print_r(json_encode(["erro" => TRUE, "msg" => "Caminhão não encontrado"]));
        }

        $cadastrar = $this->caminhao->excluir($this->requisicao);

        if ($cadastrar->erro) {
            return print_r(json_encode(["erro" => TRUE, "msg" => $cadastrar->msg]));
        }

        return print_r(json_encode(["erro" => FALSE]));
    }
}
