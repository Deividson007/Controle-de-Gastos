<?php

namespace App\Controllers;

use App\Models\FormaPagamentoModel;
use App\Models\GastoModel;
use App\Models\TipoGastoModel;

class Controle extends BaseController {
    public function index() {
        $gastoModel = new GastoModel();
        
        $viewData = [
            "tabela" => $gastoModel->getMesAtual(),
            "total" => $gastoModel->somaValor()
        ];

        return view("controle/index", $viewData);
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

    public function create() 
    {
        $tipoGastoModel = new TipoGastoModel();
        $formaPagamentoModel = new FormaPagamentoModel();

        $validacao = $this->validate([
            "data" => "required",
            "valor" => "required",
            "tipo" => "required",
            "forma" => "required",
            "descricao" => "required"
        ]);

        if (!$validacao) {
            return view("controle/novo", [
                "validation" => $this->validator,
                "optionsTipo" => $tipoGastoModel->selectList(),
                "optionsFormaPagamento" => $formaPagamentoModel->selectList()
            ]);
        }

        $gastoModel = new GastoModel();
        $session = session();

        $dados = [
            "data" => $this->request->getPost("data"),
            "valor" => str_replace(",", ".", str_replace(".", "", $this->request->getPost("valor"))),
            "idTipoGasto" => $this->request->getPost("tipo"),
            "idFormaPagamento" => $this->request->getPost("forma"),
            "descricao" => $this->request->getPost("descricao"),
            "parcelado" => $this->request->getPost("parcelado") === "1" ? true : false,
            "numeroParcelas" => $this->request->getPost("numeroParcelas"),
            "idUsuario" => $session->idUsuario
        ];

        $resposta = $gastoModel->save($dados);

        if ($resposta) {
            $session->setFlashdata("mensagem", "Usuário criado com sucesso!");
            return redirect()->to("/controle");
        }

        return view("controle/novo", [
            "mensagem" => "Não foi possível criar o usuário!",
            "optionsTipo" => $tipoGastoModel->selectList(),
            "optionsFormaPagamento" => $formaPagamentoModel->selectList()
        ]);
    }
}