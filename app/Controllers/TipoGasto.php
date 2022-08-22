<?php

namespace App\Controllers;

class TipoGasto extends BaseController {
    public function index() {
        return view("cadastro/tipoGasto");
    }
}