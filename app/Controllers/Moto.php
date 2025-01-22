<?php

namespace app\Controllers;

use app\Controllers\Veiculo;
use app\Models\Moto as modelMoto;

class Moto extends Veiculo
{
    public $moto;
    public $requisicao;

    public function __construct()
    {
        $this->moto = new modelMoto;
        $this->requisicao = $_REQUEST;
    }

    public function todos()
    {
        return print_r(json_encode($this->moto->todos()));
    }

    public function pegarPorId()
    {
        $id = isset($this->requisicao["id"]) ? $this->requisicao["id"] : NULL;

        return print_r(json_encode($this->moto->pegarPorId($id)));
    }

    public function cadastrar()
    {
        if (self::validar($this->requisicao)) {
            return;
        }

        $existe = $this->moto->exsite($this->requisicao);

        if ($existe) {
            return print_r(json_encode(["erro" => TRUE, "msg" => "Moto já existe"]));
        }

        $cadastrar = $this->moto->cadastrar($this->requisicao);

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

        $existe = $this->moto->exsite($this->requisicao);

        if ($existe) {
            return print_r(json_encode(["erro" => TRUE, "msg" => "Moto já existe"]));
        }

        $cadastrar = $this->moto->editar($this->requisicao);

        if ($cadastrar->erro) {
            return print_r(json_encode(["erro" => TRUE, "msg" => $cadastrar->msg]));
        }

        return print_r(json_encode(["erro" => FALSE]));
    }

    public function excluir()
    {
        $id = isset($this->requisicao["id"]) ? $this->requisicao["id"] : NULL;

        if (!is_numeric($id)) {
            return print_r(json_encode(["erro" => TRUE, "msg" => "Moto não encontrado"]));
        }

        $cadastrar = $this->moto->excluir($this->requisicao);

        if ($cadastrar->erro) {
            return print_r(json_encode(["erro" => TRUE, "msg" => $cadastrar->msg]));
        }

        return print_r(json_encode(["erro" => FALSE]));
    }
}
