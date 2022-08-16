<?php

namespace App\Controllers;

use CodeIgniter\Model\UsuarioModel;

class Auth extends BaseController
{
    public function index()
    {
        return view("login/index");
    }

    public function autenticar()
    {
        $usuarioModel = new UsuarioModel();
        $validacao = $this->validate([
            "email" => "required",
            "senha" => "required"
        ]);

        if (!$validacao) {
            return view("login/index", [
                "validation" => $this->validator,
            ]);
        }

        $dados = [
            "email" => "",
            "senha" => ""
        ];
    }
}
