<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfiguracaoModel extends Model {
    protected $table = "configuracao";
    protected $primaryKey = "idConfiguracao";
    protected $allowedFields = [
        "diaCorte"
    ];

    public function getConfiguracao() 
    {
        return $this->select("diaCorte")->first();
    }
}