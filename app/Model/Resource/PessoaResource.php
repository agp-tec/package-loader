<?php
/**
 *
 * Data e hora: 2020-06-25 16:08:40
 * Resource gerada automaticamente
 *
 */


namespace App\Model\Resource;


use App\ViewComposer\PessoaComposer;
use Illuminate\Http\Resources\Json\JsonResource;


class PessoaResource extends JsonResource
{
    public function toArray($request)
    {
        //De acordo com o tipo de resource solicitado modifica json de resposta.
        switch ($request->get('resource-type')) {
            case 'select2':
                $data = [
                    'id' => $this->id,
                    'text' => $this->nome . ' ' . $this->sobrenome,
                    'widget' => PessoaComposer::getWidget($this, true)
                ];
                break;
            default:
                $data = [
                    'id' => $this->id,
                    'adm_pessoa_id' => $this->adm_pessoa_id,
                    'adm_empresa_id' => $this->adm_empresa_id,
                    'imagem' => $this->imagem,
                    'nome' => $this->nome,
                    'sobrenome' => $this->sobrenome,
                    'tipo_doc' => $this->tipo_doc,
                    'doc' => $this->doc,
                    'email' => $this->email,
                    'nascimento' => $this->nascimento,
                    'sexo' => $this->sexo,
                    'idioma' => $this->idioma,
                    'fuso' => $this->fuso
                ];
        }
        return $data;
    }
}
