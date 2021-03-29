<?php


namespace App\ViewComposer;


/**
 * Class AplicativoPoliticaAceiteUsuarioComposer
 * @package App\ViewComposer
 */
class AplicativoPoliticaAceiteUsuarioComposer
{
    public static function showDoc($aplicativoPolitica, $showAceite = false)
    {
        return view('aplicativo-politica-aceite-usuario.show', compact('aplicativoPolitica', 'showAceite'));
    }
}
