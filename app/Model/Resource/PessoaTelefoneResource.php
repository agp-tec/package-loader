<?php
/**
 *
 * Data e hora: 2021-01-05 17:04:22
 * Model/Resource gerada automaticamente
 *
 */


namespace App\Model\Resource;


use Illuminate\Http\Resources\Json\JsonResource;


class PessoaTelefoneResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pessoa' => $this->pessoa->id,
            'descricao' => $this->descricao,
            'ddi' => $this->ddi,
            'ddd' => $this->ddd,
            'numero' => $this->numero,
            'verificado' => $this->verificado,
            'token' => $this->token
        ];
    }
}