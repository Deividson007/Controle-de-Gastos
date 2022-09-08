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
            gasto.ativo = ? AND
            gasto.data BETWEEN ? AND ?";

        $session = session();

        $periodo = $session->get("periodos");

        return $this->db->query($query, [1, $periodo["dataInicio"], $periodo["dataFim"]])->getResult();
    }

    public function somaValor() {
        $session = session();

        $periodo = $session->get("periodos");

        return $this->select("SUM(valor) as valor", false)
                    ->where("data >=", $periodo["dataInicio"])
                    ->where("data <=", $periodo["dataFim"])
                    ->first();
    }
}
