<?php

namespace App\Models;

use CodeIgniter\Model;

class FormaPagamentoModel extends Model {
    protected $table = "formaPagamento";
    protected $primaryKey = "idFormaPagamento";
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
                    ->select("idFormaPagamento, descricao")
                    ->where("ativo", 1)   
                    ->get()
                    ->getResult();
        
        $list = array();
        $list[""] = "-- SELECIONE --";
        foreach($result as $res) {
            $list[$res->idFormaPagamento] = $res->descricao;
        }

        return $list;
    }

    public function remove($id) {
        return $this->update(["idFormaPagamento" => $id], ["ativo" => 0]);
    }
}