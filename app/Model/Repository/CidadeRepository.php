<?php
/**
 *
 * Data e hora: 2020-06-26 21:06:16
 * Repository gerada automaticamente
 *
 */


namespace App\Model\Repository;


use Agp\BaseUtils\Model\Repository\BaseRepository;
use App\Model\Entity\Cliente;
use Illuminate\Support\Facades\Http;


class CidadeRepository extends BaseRepository
{
    protected $className = Cliente::class;

    public function __construct()
    {
        $this->hasAdmEmpresa = true;
        $this->resourceClassName = CidadeResource::class;
    }

    /** Retorna array com cidades retornadas da API utilizando query string
     * @return array|mixed|null
     */
    public function find()
    {
        $param = [
            'per_page' => request()->get('per_page', '5'),
            'page' => request()->get('page', '1'),
            'query' => [
                'nome' => request()->get('query', ['generalSearch' => ''])['generalSearch'],
            ],
        ];
        $url = config('config.api_agpadmin') . '/cidade?' . http_build_query($param);
        $res = Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->getToken(),
        ])
            ->get($url);
        if ($res->status() == 200)
            return $res->json();
        return null;
    }
}
