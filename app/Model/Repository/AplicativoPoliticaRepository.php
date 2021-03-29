<?php


namespace App\Model\Repository;


use Illuminate\Support\Facades\Http;

class AplicativoPoliticaRepository
{
    /**
     * @var string[]
     */
    private $headers;
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $app;
    /**
     * @var string
     */
    private $uri;

    public function __construct()
    {
        $this->headers = [
            'Content-type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'bearer ' . auth()->getToken(),
        ];
        $this->app = config('config.id_app');
        $this->uri = config('config.api_agpadmin') . '/politica-aceite-usuario/' . $this->app;
    }

    /** Retorna array com os documentos pendentes de aceitacao
     * @return array|mixed
     */
    public function getAceitesPendente()
    {
        $response = Http::withHeaders($this->headers)->get($this->uri);
        $data = $response->json();
        if ($data && array_key_exists('data', $data))
            return $data['data'];
        return [];
    }
}
