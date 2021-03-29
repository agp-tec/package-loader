<?php
/**
 *
 * Data e hora: 2020-06-26 21:06:16
 * Model gerada automaticamente
 *
 */


namespace App\Model\Entity;


use Agp\BaseUtils\Traits\HasCompositePrimaryKey;
use Agp\BaseUtils\Traits\ValidUserRegistry;
use App\Model\Observer\ClienteObserver;


/**
 * Model Cliente
 * Tabela: pag_cliente
 * Comentario:
 */
class Cliente extends \Agp\BaseUtils\Model\Entity\BaseModel
{
    /**
     * Dicionáro de dados:
     * adm_empresa_id
     *
     * Tipo: int     | Chave: PRI     | Obrigatório: Sim     | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * adm_pessoa_id
     *
     * Tipo: int     | Chave: PRI     | Obrigatório: Sim     | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     */
    use ValidUserRegistry, HasCompositePrimaryKey;

    public $incrementing = false;
    public $timestamps = false;
    protected $table = "com_contato";
    protected $primaryKey = ['adm_empresa_id', 'adm_pessoa_id'];
    protected $fillable = [
        "adm_empresa_id",
        "adm_pessoa_id",
    ];
    protected $fillableRelations = [
        "pessoa",
    ];

    protected static function boot()
    {
        parent::boot();
        Cliente::observe(ClienteObserver::class);
    }

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'adm_pessoa_id', 'adm_pessoa_id');
    }
}
