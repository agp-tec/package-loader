<?php

namespace App\ViewComposer;

use Agp\Log\Log;

/**
 * Retorna componentes de views relacionado a logs
 *
 * Class LogComposer
 * @package App\ViewComposer
 */
class LogComposer
{
    /**
     * Retorna array de registros de alterações da $table
     *
     * @param string $table Tabela cujo ações aconteceram
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function get($table)
    {
        $log = (new Log(0, '', $table, auth()->user()->getAdmEmpresaId()))->get(0, 10);
        if (!$log) $log = [];
        return view('layout.historic', ['log' => $log]);
    }
}
