<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function index()
    {
        return view("login/index");
    }

    public function autenticar()
    {
        $usuarioModel = new UsuarioModel();
        $session = session();

        $validacao = $this->validate([
            "email" => "required",
            "senha" => "required"
        ]);

        if (!$validacao) {
            return view("login/index", [
                "validation" => $this->validator
            ]);
        }

        $dados = [
            "email" => $this->request->getPost("email"),
            "senha" => $this->request->getPost("senha")
        ];

        $usuario = $usuarioModel->login($dados);

        if ($usuario["exists"]) {
            $sessionData = [
                "idUsuario" => $usuario["idUsuario"],
                "nome" => $usuario["nome"],
                "email" => $usuario["email"],
                "logged_in" => true
            ];

            $session->set($sessionData);

            return redirect()->to("/controle");
        }

        $session->setFlashdata("mensagem", "Email ou Senha inválidos");
        return redirect()->to("/login");
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to("/login");
    }
}
