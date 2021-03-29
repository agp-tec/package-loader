<?php
/**
 *
 * Data e hora: 2021-01-05 17:04:22
 * Model/Repository gerada automaticamente
 *
 */


namespace App\Model\Repository;


use Agp\BaseUtils\Model\Repository\BaseRepository;
use App\Model\Entity\PessoaTelefone;


class PessoaTelefoneRepository extends BaseRepository
{
    protected $className = PessoaTelefone::class;

    public function __construct()
    {
        $this->hasAdmEmpresa = false;
    }

    public function getList()
    {
        return PessoaTelefone::query()->get();
    }

    public function procuraGenerica($expressao)
    {
        return PessoaTelefone::query()
            ->where(function ($query) use ($expressao) {
                $query
                    ->orWhere('id', '=', $expressao)
                    //TODO Dados gerados automaticamente. Altere de acordo com os dados da entidade PessoaTelefone
                    ->orWhere('nome', 'like', '%' . $expressao . '%');
            })
            ->get();
    }
}