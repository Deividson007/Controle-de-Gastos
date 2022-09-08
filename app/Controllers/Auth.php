<?php

namespace App\Controllers;

use App\Models\ConfiguracaoModel;
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
        $configuracaoModel = new ConfiguracaoModel();
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
                "logged_in" => true,
                "configuracao" => $configuracaoModel->getConfiguracao(),
                "periodos" => $this->getPeriodos($configuracaoModel->getConfiguracao()["diaCorte"])
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

    private function getPeriodos($diaCorte) {
        if(explode("/", date("d/m/Y"))[0] < $diaCorte) 
        {
            $ano = date("Y");
            $mes = date("m");
            $dia = $diaCorte;
            
            $dataFim = "{$ano}-{$mes}-{$dia}";
            $mes = explode("/", date('d/m/Y', strtotime('-1 months', strtotime(date('Y-m-d')))))[1];
            $dataInicial = "{$ano}-{$mes}-{$dia}";

            return [
                "dataInicio" => $dataInicial,
                "dataFim" => $dataFim
            ];
        }
        else
        {
            $ano = date("Y");
            $mes = date("m");
            $dia = $diaCorte;
            
            $dataInicial = "{$ano}-{$mes}-{$dia}";
            $mes = explode("/", date('d/m/Y', strtotime('+1 months', strtotime(date('Y-m-d')))))[1];
            $dataFim = "{$ano}-{$mes}-{$dia}";

            return [
                "dataInicio" => $dataInicial,
                "dataFim" => $dataFim
            ];
        }
    }
}
