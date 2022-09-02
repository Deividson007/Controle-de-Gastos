<?php

namespace App\Controllers;

class Entrada extends BaseController 
{
    public function index() {

        $viewData = [
            "entradas" => []
        ];

        return view("entrada/index", $viewData);
    }

    public function novo() {
        return view("entrada/novo");
    }
}