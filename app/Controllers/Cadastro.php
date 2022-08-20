<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Cadastro extends BaseController {
    public function index() {
        return view("cadastro/index");
    }

    public function create() {
        $usuarioModel = new UsuarioModel();
        $session = session();

        $validacao = $this->validate([
            "email" => "required",
            "senha" => "required",
            "nome" => "required"
        ]);

        if (!$validacao) {
            return view("cadastro/index", [
                "validation" => $this->validator
            ]);
        }

        $dados = [
            "email" => $this->request->getPost("email"),
            "senha" => $this->request->getPost("senha"),
            "nome" => $this->request->getPost("nome"),
        ];

        $resposta = $usuarioModel->create($dados);

        if ($resposta) {
            $session->setFlashdata("mensagem", "Usuário criado com sucesso!");
            return redirect()->to("/login");
        }

        $session->setFlashdata("mensagem", "Não foi possível criar o usuário!");
        return view("cadastro/index");
    }
}