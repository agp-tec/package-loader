<?php
/**
 *
 * Data e hora: 2020-09-16 12:46:08
 * Model/Resource gerada automaticamente
 *
 */


namespace App\Model\Resource;


use Illuminate\Http\Resources\Json\JsonResource;


class EmpresaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'razao_social' => $this->razao_social,
            'email' => $this->email,
            'cpf_cnpj' => $this->cpf_cnpj,
        ];
    }
}
