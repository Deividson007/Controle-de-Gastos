<?php

namespace App\Models;

use CodeIgniter\Model;

class EntradaModel extends Model {
    protected $table = "entrada";
    protected $primaryKey = "idEntrada";
    protected $allowedFields = [
        "valor",
        "idDadoBancario",
        "dataEntrada",
        "ativo"
    ];

    public function getEntrada() {
        return $this->select("valor")->first();
    }
}