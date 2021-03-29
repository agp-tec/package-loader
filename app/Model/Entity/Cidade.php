<?php
/**
 *
 * Data e hora: 2021-01-06 15:30:30
 * Model/Entity gerada automaticamente
 *
 */


namespace App\Model\Entity;


use Agp\BaseUtils\Model\Entity\BaseModel;


/**
 * Model Cidade
 * Tabela: pag_cidade
 * Comentario: VIEW
 *
 * id
 * Chave primária, código do município de acordo com tabela do IBGE.
 * Tipo: int     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * nome
 * Nome da cidade.
 * Tipo: varchar(45)     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * uf
 * Código do estado no formato ISO 3166-2. Exemplo: SP
 * Tipo: varchar(2)     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * sigla_pais
 * Código do país no formato ISO 3166-1 alpha-2. Exemplo: BR
 * Tipo: varchar(2)     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * adm_pais_id
 * Chave estrangeira de adm_pais.id.
 * Tipo: int     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
class Cidade extends BaseModel
{

    public $timestamps = false;
    protected $table = "com_cidade";
    protected $fillable = [
        "nome",
        "uf",
        "sigla_pais",
        "adm_pais_id",
    ];
}
