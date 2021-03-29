<?php

namespace App\Controller\Web;

use Agp\Login\Model\Service\UsuarioService;
use Agp\Webhook\Model\Entity\Webhook;
use App\Controller\Controller;
use App\Helper\Search;
use App\Model\Repository\AplicativoPoliticaRepository;
use App\Model\Repository\EmpresaRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function posLogin(Request $request)
    {
        $empresa = (new EmpresaRepository)->getById(auth()->user()->getAdmEmpresaId());
        $contaId = (new UsuarioService())->novoLoginWeb($empresa->getKey(), $empresa->nome);

        //Redireciona usuario para a pagina que estava antes de deslogar
        $goto = json_decode(request()->session()->get('goto'));
        if ($goto && $goto->contaId == $contaId) {
            request()->session()->pull('goto');
            return redirect()->to($goto->url)->withInput((array)$goto->input);
        }

        return redirect()->route('web.home', ['contaId' => $contaId]);
    }

    public function forget(Request $request, $email)
    {
        (new UsuarioService())->forget($email);
        return redirect()->route('web.login.index');
    }

    public function index()
    {
        $politicasPedente = (new AplicativoPoliticaRepository)->getAceitesPendente();
        if (count($politicasPedente) >= 1) {
            return view('aplicativo-politica-aceite-usuario.create', ['aplicativoPolitica' => (object)$politicasPedente[0]]);
        }

        return view('index');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $search = new Search();
        $search->load($query);
        $list = $search->result;
        return view('layout.partials.extras._quick_search_result',['list' => $list]);
    }

    public function settings(Request $request) {
        $webhooks = Webhook::query()->where(['adm_empresa_id' => auth()->user()->getAdmEmpresaId()])->get();
        return view('usuario.settings', [
            'webhooks' => $webhooks,
        ]);
    }

}
