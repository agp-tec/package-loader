<?php
/**
 *
 * Data e hora: 2020-06-25 16:08:40
 * Repository gerada automaticamente
 *
 */


namespace App\Model\Repository;


use Agp\BaseUtils\Model\Repository\BaseRepository;
use App\Model\Entity\Pessoa;
use App\Model\Resource\PessoaResource;
use Illuminate\Support\Facades\DB;


class PessoaRepository  extends BaseRepository
{
    protected $className = Pessoa::class;

    public function __construct()
    {
        $this->hasAdmEmpresa = true;
        $this->resourceClassName = PessoaResource::class;
    }

    public function getList()
    {
        $b = Pessoa::query()->where(['adm_empresa_id' => auth()->user()->getAdmEmpresaId()]);
        return $this->executa($b);
    }

    /** Retorna a pessoa buscando por atributo que seja dado sensivel
     * @param String $attribute Campo do banco de dados que seja único (doc, e-mail, etc)
     * @param String $data Valor a procurar
     * @return Pessoa|null
     */
    public function getByAttribute($attribute, $data)
    {
        return Pessoa::query()
            ->where([
                'adm_empresa_id' => auth()->user()->getAdmEmpresaId(),
                $attribute => encrypter($data, false)
            ])
            ->limit(1)
            ->get()
            ->first();
    }

    public function getPagamentosByPessoaId($id)
    {
        $pessoa = Pessoa::query()->find($id);
        if ($pessoa)
            return $pessoa->perfilPagamentoList;
        return [];
    }

    public function getCount()
    {
        return Pessoa::query()->where(['adm_empresa_id' => auth()->user()->getAdmEmpresaId()])->count();
    }

    public function procuraGenerica($expressao)
    {
        $b = Pessoa::query()
            ->where(['adm_empresa_id' => auth()->user()->getAdmEmpresaId()])
            ->where(function ($query) use ($expressao) {
                $query->orWhere('id', '=', $expressao)
                    ->orWhere('nome', 'like', '%' . $expressao . '%')
                    ->orWhere('doc', '=', encrypter($expressao, false))
                    ->orWhere('email', '=', encrypter($expressao, false))
                    ->orWhere(DB::raw('CONCAT(nome," ",sobrenome)'), 'like', '%' . $expressao . '%')
                    ->orWhere('sobrenome', 'like', '%' . $expressao . '%');
            });
        return $this->executa($b);
    }
}
