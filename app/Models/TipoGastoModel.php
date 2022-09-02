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

    public function selectList() {
        $result = $this
                    ->select("idTipoGasto, descricao")
                    ->where("ativo", 1)   
                    ->get()
                    ->getResult();
        
        $list = array();
        $list[""] = "-- SELECIONE --";
        foreach($result as $res) {
            $list[$res->idTipoGasto] = $res->descricao;
        }

        return $list;
    }

    public function remove($id) {
        $this->builder()->set("ativo", 0)->where("idTipoGasto", $id)->update();
    }
}