<?php


namespace App\ViewComposer;


use App\Model\Entity\Pessoa;
use Illuminate\View\View;
use Throwable;

/**
 * Class PessoaComposer
 * Contém os fragmentos de layout relacionados a pessoa/cliente
 * @package App\ViewComposer
 */
class PessoaComposer
{
    /**
     * Retorna o widget contendo imagem, nome e sobrenome e e-mail da pessoa
     *
     * @param Pessoa $pessoa Entidade pessoa
     * @return View
     * @throws Throwable
     */
    public static function getWidget($pessoa)
    {
        return view('pessoa.widget', compact('pessoa'));
    }

    /**
     * Retorna as ações da listagem de pessoa/cliente
     *
     * @param Pessoa $pessoa Entidade pessoa
     * @return View
     * @throws Throwable
     */
    public static function getActions($pessoa)
    {
        return view('pessoa.actions', compact('pessoa'));
    }
}
