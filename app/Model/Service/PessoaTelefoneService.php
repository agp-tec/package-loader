<?php
/**
 *
 * Data e hora: 2021-01-05 17:04:22
 * Model/Service gerada automaticamente
 *
 */


namespace App\Model\Service;


use Agp\BaseUtils\Model\Service\BaseService;
use App\Model\Entity\PessoaTelefone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class PessoaTelefoneService extends BaseService
{
    /**
     * @param PessoaTelefone $model
     * @return Model
     * @throws ValidationException
     */
    public function update($model)
    {
        if ($model->getOriginal('verificado') == '1')
            throw ValidationException::withMessages(['message' => 'Não é possível alterar um telefone verificado.']);

        return parent::update($model);
    }
}