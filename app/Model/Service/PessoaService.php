<?php
/**
 *
 * Data e hora: 2020-06-25 16:08:40
 * Service gerada automaticamente
 *
 */

namespace App\Model\Service;


use Agp\BaseUtils\Model\Service\BaseService;
use Agp\Log\Jobs\LogJob;
use Agp\Log\Log;
use App\Model\Entity\Pessoa;
use App\Model\Repository\PessoaRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PessoaService
 * @package App\Model\Service
 */
class PessoaService extends BaseService
{
    /**
     * @param Model|Pessoa $pessoa
     * @return Model|void
     * @throws Exception
     */
    public function store($pessoa)
    {
        $model = parent::store($pessoa);

        if (auth()->check() && auth()->user()->getAdmEmpresaId() && ($model->cliente()->get()->count() == 0))
            $model->cliente()->updateOrCreate([
                'adm_empresa_id' => auth()->user()->getAdmEmpresaId(),
            ]);

        LogJob::dispatch(new Log(1, 'Cliente #' . $model->getKey() . ' ' . $model->nome . ' atualizado', 'pag_cliente'));

        return $model;
    }

    // TODO Adicionar validacao web em adm/controller/web

    /** Prepara os dados da requisição do formulário e as regras do formulário
     * @param $data
     * @param $rules
     */
    public function prepareRulesAndRequest($data, $rules)
    {
        if ($data['doc']) {
            if ($data['tipo_doc'] != 1)
                if ($data['tipo_doc'] != 2)
                    if ($data['tipo_doc'] != 3)
                        request()->merge(['doc' => null]);
        } else
            request()->merge(['tipo_doc' => null]);

        if (request()->get('doc')) {
            if (request()->get('tipo_doc') == 1)
                $rules['doc'] = 'max:255|required|cpf|formato_cpf';
            else
                $rules['doc'] = 'max:255|required';
        } else
            $rules['email'] = 'max:255|required';
    }

    /** Consulta pessoa ou cria nova
     * @param object $data
     * @return Model|void
     * @throws Exception
     */
    public function getOrCreate($data)
    {
        if (isset($data->id))
            return (new PessoaRepository)->getById($data->id);
        //Não possui ID, entao salva registro
        $pessoa = new Pessoa((array)$data);
        return $this->store($pessoa);
    }
}
