<?php
/**
 *
 * Data e hora: 2021-01-05 16:54:22
 * Model/Repository gerada automaticamente
 *
 */


namespace App\Model\Repository;


use Agp\BaseUtils\Model\Repository\BaseRepository;
use App\Model\Entity\PessoaEndereco;


class PessoaEnderecoRepository extends BaseRepository
{
    protected $className = PessoaEndereco::class;

    public function __construct()
    {
        $this->hasAdmEmpresa = false;
    }

    public function getList()
    {
        return PessoaEndereco::query()->get();
    }

    public function procuraGenerica($expressao)
    {
        return PessoaEndereco::query()
            ->where(function ($query) use ($expressao) {
                $query
                    ->orWhere('id', '=', $expressao)
                    //TODO Dados gerados automaticamente. Altere de acordo com os dados da entidade PessoaEndereco
                    ->orWhere('nome', 'like', '%' . $expressao . '%');
            })
            ->get();
    }
}