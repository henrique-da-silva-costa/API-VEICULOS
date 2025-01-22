<?php

namespace app\Models;

use app\Models\Banco;

class Veiculo
{
    public $db;

    public function __construct()
    {
        $this->db = new Banco;
    }
}
