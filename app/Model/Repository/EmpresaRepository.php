<?php
/**
 *
 * Data e hora: 2020-09-16 12:46:08
 * Model/Repository gerada automaticamente
 *
 */


namespace App\Model\Repository;


use Agp\BaseUtils\Model\Repository\BaseRepository;
use App\Model\Entity\Empresa;


class EmpresaRepository extends BaseRepository
{
    protected $className = Empresa::class;

    public function __construct()
    {
        $this->hasAdmEmpresa = false;
    }

    public function getList()
    {
        return Empresa::query()->get();
    }

    public function procuraGenerica($expressao)
    {
        return Empresa::query()
            ->where(function ($query) use ($expressao) {
                $query
                    ->orWhere('id', '=', $expressao)
                    //TODO Dados gerados automaticamente. Altere de acordo com os dados da entidade Empresa
                    ->orWhere('nome', 'like', '%' . $expressao . '%');
            })
            ->get();
    }
}
