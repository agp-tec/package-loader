<?php
/**
 *
 * Data e hora: 2020-06-26 21:06:16
 * Repository gerada automaticamente
 *
 */


namespace App\Model\Repository;


use Agp\BaseUtils\Model\Repository\BaseRepository;
use App\Model\Entity\Cliente;
use App\Model\Resource\ClienteResource;


class ClienteRepository extends BaseRepository
{
    protected $className = Cliente::class;

    public function __construct()
    {
        $this->hasAdmEmpresa = true;
        $this->resourceClassName = ClienteResource::class;
    }

    public function getList()
    {
        return Cliente::query()->where(['adm_empresa_id' => auth()->user()->getAdmEmpresaId()])->get();
    }
}
