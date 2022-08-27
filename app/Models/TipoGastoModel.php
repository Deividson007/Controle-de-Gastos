<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoGastoModel extends Model {
    protected $table = "tipoGasto";
    protected $primaryKey = "idTipoGasto";
    protected $allowedFields = [
        "descricao"
    ];

    public function getLista()
    {
        return $this
                ->where("ativo", 1)
                ->orderBy("descricao")
                ->get()
                ->getResult();
    }

    public function remove($id) {
        return $this->update(["idTipoGasto" => $id], ["ativo" => 0]);
    }
}