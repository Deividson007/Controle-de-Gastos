<?php

namespace App\Controllers;

use App\Models\EntradaModel;

class Entrada extends BaseController
{
    public function index()
    {
        $entradaModel = new EntradaModel();

        $viewData = [
            "entradas" => $entradaModel->getLista()
        ];

        return view("entrada/index", $viewData);
    }

    public function novo()
    {
        return view("entrada/novo");
    }

    public function create()
    {
        $validacao = $this->validate([
            "dataEntrada" => "required",
            "valor" => "required"
        ]);

        if (!$validacao) {
            return view("entrada/novo", [
                "validation" => $this->validator,
            ]);
        }

        $entradaModel = new EntradaModel();
        $session = session();

        $dados = [
            "dataEntrada" => $this->request->getPost("dataEntrada"),
            "valor" => str_replace(",", ".", str_replace(".", "", $this->request->getPost("valor"))),
        ];

        $resposta = $entradaModel->save($dados);

        if ($resposta) {
            $session->setFlashdata("mensagem", "Entrada adicionada com sucesso!");
            return redirect()->to("/entrada");
        }

        return view("entrada/novo", [
            "mensagem" => "Não foi possível adicionar a entrada!"
        ]);
    }

    public function remove($id) {
        $entradaModel = new EntradaModel();
        $entradaModel->remove($id);
        return redirect()->to("/entrada");
    }
}
