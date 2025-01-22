<?php

namespace app\Controllers;

class Veiculo
{
    public static function validar($request)
    {
        try {
            foreach ($request as $index => $valor) {
                if ($index == "ano" && !is_numeric($valor)) {
                    return print_r(json_encode(["erro" => TRUE, "msg" => "O campo $index deve ser numerico"]));
                }

                if (strlen($valor) <= 0) {
                    return print_r(json_encode(["erro" => TRUE, "msg" => "campo vazio"]));
                }
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
