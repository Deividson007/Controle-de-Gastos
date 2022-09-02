<?php

namespace App\Controllers;

use App\Models\TipoGastoModel;
use Exception;

class TipoGasto extends BaseController
{
    public function index()
    {
        $tipoGastoModel = new TipoGastoModel();

        $viewData = [
            "tipoGasto" => $tipoGastoModel->getLista()
        ];

        return view("tipoGasto/index", $viewData);
    }

    public function create()
    {
        $validacao = $this->validate([
            "descricao" => "required"
        ]);

        if (!$validacao) {
            return view("tipoGasto/index", [
                "validation" => $this->validator
            ]);
        }

        $tipoGastoModel = new TipoGastoModel();

        $dados = [
            "descricao" => $this->request->getPost("descricao")
        ];

        if($tipoGastoModel->save($dados)) {
            $viewData = [
                "tipoGasto" => $tipoGastoModel->getLista(),
                "mensagemSuccess" => "Informação gravado com sucesso!"
            ];
            return view("tipoGasto/index", $viewData);
        }
        else
        {
            $viewData = [
                "tipoGasto" => $tipoGastoModel->getLista(),
                "mensagemErro" => "Não foi possível gravar a informação"
            ];
            return view("tipoGasto/index", $viewData);
        }
    }

    public function remove($id) {
        $tipoGastoModel = new TipoGastoModel();
        $tipoGastoModel->remove($id);
        return redirect()->to("/tipo-gasto");
    }
}
