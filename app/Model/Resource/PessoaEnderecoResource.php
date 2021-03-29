<?php
/**
 *
 * Data e hora: 2021-01-05 16:54:22
 * Model/Resource gerada automaticamente
 *
 */


namespace App\Model\Resource;


use Illuminate\Http\Resources\Json\JsonResource;


class PessoaEnderecoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pessoa' => $this->pessoa->id,
            'descricao' => $this->descricao,
            'numero' => $this->numero,
            'rua' => $this->rua,
            'bairro' => $this->bairro,
            'cep' => $this->cep,
            'cidade' => $this->cidade,
        ];
    }
}