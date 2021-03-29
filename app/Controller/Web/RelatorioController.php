<?php
/**
 *
 * Data e hora: 2020-06-28 15:58:50
 * Observer gerada automaticamente
 *
 */


namespace App\Controller\Web;


use Agp\Log\Log;
use App\Controller\Controller;
use App\Model\Entity\Pessoa;
use Illuminate\Http\Request;


class RelatorioController extends Controller
{
    public function usuarioAcesso(Request $request)
    {
        return view('relatorio.usuario.acesso');
    }

    public function usuarioAcessoData(Request $request)
    {
        $list = (new Log(0, '', '', auth()->user()->getAdmEmpresaId()))->getAcessosSistema();
        if (!$list) $list = [];
        foreach ($list as $item) {
            $pessoa = new Pessoa();
            $pessoa->email = decryptor($item->usuario->email);
            $item->usuario->email = $pessoa->email;
            $item->usuario->imagem = $pessoa->imagem;
        }
        return $list;
    }
}
