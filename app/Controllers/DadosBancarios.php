<?php

namespace App\Controllers;

use App\Models\DadosBancariosModel;
use Exception;

class DadosBancarios extends BaseController {
    public function index() {
        $dadosBancariosModel = new DadosBancariosModel();
        $session = session();

        $viewData = [
            "dadosBancarios" => $dadosBancariosModel->getPorUsuario($session->idUsuario)
        ];

        return view("dadosBancarios/index", $viewData);
    }

    public function create() {
        try {
            $validacao = $this->validate([
                "banco" => "required",
                "agencia" => "required",
                "conta" => "required"
            ]);
    
            if (!$validacao) {
                return view("dadosBancarios/index", [
                    "validation" => $this->validator
                ]);
            }
    
            $dadosBancariosModel = new DadosBancariosModel();
            $session = session();
    
            $dados = [
                "banco" => $this->request->getPost("banco"),
                "agencia" => $this->request->getPost("agencia"),
                "conta" => $this->request->getPost("conta"),
                "idUsuario" => $session->idUsuario
            ];
    
            $dadosBancariosModel->save($dados);

            $viewData = [
                "mensagemSuccess" => "Informação gravado com sucesso!"
            ];
            return view("dadosBancarios/index", $viewData);
        }
        catch (Exception $e) {
            $viewData = [
                "mensagemErro" => "Não foi possível gravar a informação!"
            ];
            return view("dadosBancarios/index", $viewData);
        }
    }

    public function remove($id) {
        try {
            $dadosBancariosModel = new DadosBancariosModel();
            $session = session();

            $resp = $dadosBancariosModel->remove($id);

            $viewData = [
                "dadosBancarios" => $dadosBancariosModel->getPorUsuario($session->idUsuario),
                "mensagemSuccess" => "Informação removida com sucesso!"
            ];

            return view("dadosBancarios/index", $viewData);
        }
        catch (Exception $e) {
            dd($e);
            $viewData = [
                "mensagemErro" => "Não foi possível gravar a informação!"
            ];
            return view("dadosBancarios/index", $viewData);
        }
    }
}