<?php

namespace App\Models;

use CodeIgniter\Model;

class DadosBancariosModel extends Model {
    protected $table = "dadoBancario";
    protected $primaryKey = "idDadoBancario";
    protected $allowedFields = [
        "idUsuario",
        "banco",
        "agencia",
        "conta",
        "ativo"
    ];

    public function getPorUsuario($id) {
        return $this
                ->where("idUsuario", $id)
                ->where("ativo", 1)
                ->orderBy("banco")
                ->get()
                ->getResult();
    }

    public function remove($id) {
        return $this->update(["idDadoBancario" => $id], ["ativo" => 0]);
    }
}