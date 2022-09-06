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

    public function getEntrada() 
    {
        return $this->select("valor")->first();
    }
    
    public function getLista()
    {
        return $this
                ->where("ativo", 1)
                ->orderBy("dataEntrada")
                ->get()
                ->getResult();
    }

    public function remove($id) 
    {
        $this->builder()->set("ativo", 0)->where("idEntrada", $id)->update();
    }
}