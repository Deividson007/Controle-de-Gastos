<?php

namespace App\Controllers;

use App\Models\FormaPagamentoModel;
use App\Models\TipoGastoModel;

class Controle extends BaseController {
    public function index() {
        return view("controle/index");
    }

    public function novo()
    {
        $tipoGastoModel = new TipoGastoModel();
        $formaPagamentoModel = new FormaPagamentoModel();

        $viewData = [
            "optionsTipo" => $tipoGastoModel->selectList(),
            "optionsFormaPagamento" => $formaPagamentoModel->selectList()
        ];

        return view("controle/novo", $viewData);
    }

    public function create() {

        return redirect()->to("/controle");
    }
}