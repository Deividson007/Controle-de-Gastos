<?php

namespace App\Models;

use CodeIgniter\Model;

class GastoModel extends Model
{
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

    public function getMesAtual()
    {
        $query = "
        SELECT
            gasto.idGasto, gasto.descricao, gasto.data, gasto.valor, tipoGasto.descricao AS tipo
        FROM
            gasto gasto
            INNER JOIN tipoGasto tipoGasto ON gasto.idTipoGasto = tipoGasto.idTipoGasto
        WHERE
            gasto.ativo = ?";

        return $this->db->query($query, [1])->getResult();
    }

    public function somaValor() {
        return $this->select("SUM(valor) as valor", false)->first();
    }
}
