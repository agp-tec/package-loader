<?php
/**
 *
 * Data e hora: 2020-09-21 22:30:27
 * Model/Entity gerada automaticamente
 *
 */


namespace App\Model\Entity;


class EmpresaApi extends \Agp\BaseUtils\Model\Entity\BaseModel
{
    public $timestamps = false;
    protected $table = "com_empresa_api";
    protected $fillable = [
        "id",
        "adm_empresa_id",
        "adm_pessoa_id",
        "descricao",
        "token_client",
        "token_secret",
        "expiracao"
    ];
    protected $fillableRelations = [
    ];

}
