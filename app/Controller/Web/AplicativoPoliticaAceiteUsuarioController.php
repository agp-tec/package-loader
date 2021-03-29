<?php
/**
 *
 * Data e hora: 2020-09-04 00:16:37
 * Controller/Web gerada automaticamente
 *
 */


namespace App\Controller\Web;


use App\Controller\Controller;
use Illuminate\Support\Facades\Http;


class AplicativoPoliticaAceiteUsuarioController extends Controller
{
    public function store()
    {
        if (!request()->get('id'))
            return redirect()->back()->withErrors('ID do documento inválido.');

        $response = Http::withHeaders([
            'Content-type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'bearer ' . auth()->getToken(),
        ])->post(config('config.api_agpadmin') . '/politica-aceite-usuario/' . config('config.id_app') . '/' . request()->get('id'),
            ['client' => [
                'user_agent' => request()->userAgent(),
                'ip' => request()->ip(),
            ]]);

        return redirect()->route('web.home');
    }
}
