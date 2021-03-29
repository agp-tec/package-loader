<?php
/**
 *
 * Data e hora: 2020-09-16 12:46:08
 * Model/Entity gerada automaticamente
 *
 */


namespace App\Model\Entity;


use App\Model\Observer\EmpresaObserver;


/**
 * Model Empresa
 * Tabela: pag_empresa
 * Comentario: VIEW
 *
 * id
 * Chave primária, auto incremental
 * Tipo: int     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * nome
 * Nome da empresa. Se pessoa é jurídica (tipo = 1) representa nome fantasia. Se pessoa é física (tipo = 2) representa nome completo.
 * Tipo: varchar(45)     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * razao_social
 * Razão social usado quando empresa é juridica (tipo = 1)
 * Tipo: varchar(45)     | Chave:     | Obrigatório: Não     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * email
 * E-mail de contato da empresa
 * Tipo: varchar(255)     | Chave:     | Obrigatório: Não     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * cpf_cnpj
 * Dado sensível. Documento único da empresa. Quando juridica (tipo = 1) é CNPJ. Quando fisica (tipo = 2) é CPF. Registro salvo com máscaras (00.000.000/0000-00 ou 000.000.000-00).
 * Tipo: varchar(255)     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
class Empresa extends \Agp\BaseUtils\Model\Entity\BaseModel
{

    public $timestamps = false;
    protected $table = "com_empresa";
    protected $fillable = [
        "nome",
        "razao_social",
        "email",
        "cpf_cnpj",
    ];
    protected $fillableRelations = [
    ];

    protected static function boot()
    {
        parent::boot();
        Empresa::observe(EmpresaObserver::class);
    }

    public function getRules()
    {
        return [
            "nome" => "string|max:45|required",
            "razao_social" => "string|max:45|nullable",
            "email" => "string|max:255|nullable",
            "cpf_cnpj" => "string|max:255|required",
        ];
    }


    public function setCpfCnpjAttribute($value)
    {

        $this->attributes['cpf_cnpj'] = encrypter($value, false);
    }

    public function getCpfCnpjAttribute($value)
    {
        return decryptor($value);
    }
}
