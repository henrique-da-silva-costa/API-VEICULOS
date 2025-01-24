<?php

namespace app\Models;

use PDO;
use stdClass;
use app\Models\Veiculo;
use app\Models\Tabelas;

class Moto extends Veiculo
{
    public function pegarPorId($id)
    {
        try {
            if (!is_numeric($id)) {
                return NULL;
            }

            $this->db->conectar();

            $sql = "SELECT * FROM " . Tabelas::MOTO . " WHERE id = :id";
            $stmt = $this->db->conexao->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $carros = $stmt->fetch(PDO::FETCH_ASSOC);

            return $carros;
        } catch (\Throwable $th) {
            return NULL;
        }
    }

    public function exsite($dados)
    {

        $id = isset($dados["id"]) ? $dados["id"] : 0;
        $nome = isset($dados["nome"]) ? $dados["nome"] : NULL;
        $ano = isset($dados["ano"]) ? $dados["ano"] : NULL;
        $marca = isset($dados["marca"]) ? $dados["marca"] : NULL;

        try {
            $this->db->conectar();

            $sql = "SELECT * FROM " . Tabelas::MOTO . " WHERE nome = :nome AND ano = :ano AND marca = :marca AND id <> :id";
            $stmt = $this->db->conexao->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":marca", $marca);
            $stmt->bindParam(":ano", $ano);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $carros = $stmt->fetch(PDO::FETCH_ASSOC);

            return $carros;
        } catch (\Throwable $th) {
            print_r($th->getMessage());
            return NULL;
        }
    }

    public function todos()
    {
        try {
            $this->db->conectar();

            $sql = "SELECT * FROM " . Tabelas::MOTO;
            $stmt = $this->db->conexao->query($sql);
            $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $carros;
        } catch (\Throwable $th) {
            print_r($th->getMessage());
            return [];
        }
    }

    public function cadastrar($dados)
    {
        try {
            $this->db->conectar();

            $retorno = new stdClass;
            $retorno->erro = FALSE;
            $retorno->msg = NULL;

            $nome = isset($dados["nome"]) ? $dados["nome"] : NULL;
            $ano = isset($dados["ano"]) ? $dados["ano"] : NULL;
            $marca = isset($dados["marca"]) ? $dados["marca"] : NULL;

            $sql = "INSERT INTO " . Tabelas::MOTO . " (nome,ano,marca) VALUES(:nome, :ano, :marca)";
            $stmt = $this->db->conexao->prepare($sql);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":ano", $ano, PDO::PARAM_INT);
            $stmt->bindParam(":marca", $marca, PDO::PARAM_STR);

            $stmt->execute();

            return $retorno;
        } catch (\Throwable $th) {
            $retorno = new stdClass;
            $retorno->erro = FALSE;
            $retorno->msg = print_r($th->getMessage());

            return $retorno;
        }
    }

    public function editar($dados)
    {
        try {
            $this->db->conectar();

            $retorno = new stdClass;
            $retorno->erro = FALSE;
            $retorno->msg = NULL;

            $nome = isset($dados["nome"]) ? $dados["nome"] : NULL;
            $ano = isset($dados["ano"]) ? $dados["ano"] : NULL;
            $marca = isset($dados["marca"]) ? $dados["marca"] : NULL;
            $id = isset($dados["id"]) ? $dados["id"] : NULL;

            $sql = "UPDATE " . Tabelas::MOTO . " SET nome = :nome, ano = :ano, marca = :marca WHERE id = :id";
            $stmt = $this->db->conexao->prepare($sql);
            $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
            $stmt->bindParam(":ano", $ano, PDO::PARAM_INT);
            $stmt->bindParam(":marca", $marca, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            return $retorno;
        } catch (\Throwable $th) {
            $retorno = new stdClass;
            $retorno->erro = FALSE;
            $retorno->msg = print_r($th->getMessage());

            return $retorno;
        }
    }

    public function excluir($dados)
    {
        try {
            $this->db->conectar();

            $retorno = new stdClass;
            $retorno->erro = FALSE;
            $retorno->msg = NULL;

            $id = isset($dados["id"]) ? $dados["id"] : NULL;

            $sql = "DELETE FROM " . Tabelas::MOTO . " WHERE id = :id";
            $stmt = $this->db->conexao->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            return $retorno;
        } catch (\Throwable $th) {
            $retorno = new stdClass;
            $retorno->erro = FALSE;
            $retorno->msg = print_r($th->getMessage());

            return $retorno;
        }
    }
}
