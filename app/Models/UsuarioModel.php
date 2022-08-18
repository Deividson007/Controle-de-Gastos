<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {
    protected $table = "usuario";
    protected $primaryKey = "idUsuario";
    protected $allowedFields = [
        "nome",
        "email",
        "senha"
    ];

    public function login($dados) {
        $usuario = $this->where("email", $dados["email"])->where("senha", $this->hashValue($dados["senha"]))->first();
        $usuario->exists = false;

        if($usuario) {
            $usuario->exists = true;
            return $usuario;
        }

        return $usuario;
    }

    private function hashValue($valor) {
        return hash("sha512", $valor);
    }
}