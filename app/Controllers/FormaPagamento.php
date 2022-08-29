<?php

namespace App\Controllers;

use App\Models\FormaPagamentoModel;

class FormaPagamento extends BaseController {
    public function index() {
        $formaPagamentoModel = new FormaPagamentoModel();

        $viewData = [
            "formaPagamento" => $formaPagamentoModel->getLista()
        ];

        return view("formaPagamento/index", $viewData);
    }

    public function create() {
        $formaPagamentoModel = new FormaPagamentoModel();
        
        $validacao = $this->validate([
            "descricao" => "required"
        ]);

        if (!$validacao) {
            return view("formaPagamento/index", [
                "validation" => $this->validator,
                "formaPagamento" => $formaPagamentoModel->getLista()
            ]);
        }

        $formaPagamentoModel = new FormaPagamentoModel();

        $dados = [
            "descricao" => $this->request->getPost("descricao")
        ];

        if($formaPagamentoModel->save($dados)) {
            $viewData = [
                "formaPagamento" => $formaPagamentoModel->getLista(),
                "mensagemSuccess" => "Informação gravado com sucesso!"
            ];
            return view("formaPagamento/index", $viewData);
        }
        else
        {
            $viewData = [
                "formaPagamento" => $formaPagamentoModel->getLista(),
                "mensagemErro" => "Não foi possível gravar a informação"
            ];
            return view("formaPagamento/index", $viewData);
        }
    }
}