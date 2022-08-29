<?php

namespace App\Models;

use CodeIgniter\Model;

class GastoModel extends Model {
    protected $table = "gasto";
    protected $primaryKey = "idGasto";
    protected $allowedFields = [
        "idUsuario",
        "descricao",
        "valor",
        "idTipoGasto",
        "idFormaPagamento",
        "parcelado",
        "numeroParcelas",
        "data"
    ];
}