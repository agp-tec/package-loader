<?php

namespace App\ViewComposer;

use App\Model\Repository\UsuarioRepository;

class UsuarioComposer
{
    public static function getAtividadeRecente()
    {
        $list = UsuarioRepository::getAtividadeRecente();
        return view('usuario.atividaderecente', ['list' => $list ? $list->data : []]);
    }
}
