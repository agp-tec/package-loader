<?php
/**
 *
 * Data e hora: 2021-01-05 17:04:22
 * Model/Entity gerada automaticamente
 *
 */


namespace App\Model\Entity;


use Agp\BaseUtils\Model\Entity\BaseApiModel;
use App\Model\Observer\PessoaTelefoneObserver;
use App\Model\Resource\PessoaTelefoneResource;


/**
 * Model PessoaTelefone
 * Tabela: com_pessoa_telefone
 * Comentario: VIEW
 *
 * id
 * Chave primária, auto incremental.
 * Tipo: int     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * adm_pessoa_id
 * Chave estrangeira primária de adm_pessoa.id.
 * Tipo: int     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * descricao
 * Descrição do telefone.
 * Tipo: varchar(25)     | Chave:     | Obrigatório: Não     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * ddi
 * Código do país.
 * Tipo: int     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * ddd
 * Código regional.
 * Tipo: int     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * numero
 * Dado sensível. Número de telefone.
 * Tipo: varchar(255)     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * verificado
 * Informa se o número foi verificado através do recebimento de token de validação.
 * Tipo: tinyint     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
class PessoaTelefone extends BaseApiModel
{

    public $timestamps = false;
    protected $table = "com_pessoa_telefone";
    protected $fillable = [
        "adm_pessoa_id",
        "descricao",
        "ddi",
        "ddd",
        "numero",
        "verificado",
        "token"
    ];
    protected $fillableRelations = [
        "pessoa"
    ];

    protected $casts = [
        'verificado' => 'integer'
    ];

    protected $attributes = [
        'verificado' => 0,
        'ddi' => "+55",
        "token" => ""
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        //Api base model
        if (auth()->check()) {
            $this->app = config('config.id_app');
            $this->authorization = 'bearer ' . auth()->getToken();
        } else {
            throw new \Exception('Não é possível utilizar a model sem estar autenticado.');
        }
        $this->resourceClosure = function ($model) {
            return (new PessoaTelefoneResource($model))->toArray(request());
        };
    }

    protected static function boot()
    {
        parent::boot();
        PessoaTelefone::observe(PessoaTelefoneObserver::class);
    }

    public function getEndPoint()
    {
        return config('config.api_agpadmin') . '/pessoa/' . $this->adm_pessoa_id . '/pessoa-telefone';
    }

    public function getRules()
    {
        return [
            "telefone" => "required|celular_com_ddd",
            "descricao" => "max:25|nullable",
        ];
    }

    public function getMessages()
    {
        return [
            "telefone.required" => "O ''telefone'' é obrigatório",
            "telefone.celular_com_ddd" => "Digite um ''número de celular'' válido",
            "telefone.min" => "O ''telefone'' inserido é inválido",
            "descricao.max" => "A ''descrição'' é muito longa"
        ];
    }

    public function pessoa()
    {
        return $this->belongsTo('App\Model\Entity\Pessoa', 'adm_pessoa_id');
    }

    public function getTelefoneAttribute()
    {
        return $this->ddd . $this->numero;
    }

    public function setNumeroAttribute($value)
    {
        $this->attributes['numero'] = encrypter($value);
    }

    public function getNumeroAttribute($value)
    {
        return decryptor($value);
    }


}
