<?php
/**
 *
 * Data e hora: 2020-09-21 22:30:27
 * Model/Repository gerada automaticamente
 *
 */


namespace App\Model\Repository;


use Agp\BaseUtils\Model\Repository\BaseRepository;
use App\Model\Entity\EmpresaApi;


class EmpresaApiRepository extends BaseRepository
{
    protected $className = EmpresaApi::class;

    public function __construct()
    {
        $this->hasAdmEmpresa = false;
    }

    public static function getByClientToken($token)
    {
        return EmpresaApi::query()->where(['token_client' => $token])->limit(1)->get()->first();
    }
}
