<?php
/**
 *
 * Data e hora: 2021-01-05 16:54:22
 * Model/Entity gerada automaticamente
 *
 */


namespace App\Model\Entity;


use Agp\BaseUtils\Model\Entity\BaseApiModel;
use App\Model\Observer\PessoaEnderecoObserver;
use App\Model\Resource\PessoaEnderecoResource;


/**
 * Model PessoaEndereco
 * Tabela: pag_pessoa_endereco
 * Comentario: VIEW
 *
 * id
 * Chave primária, auto incremental.
 * Tipo: int     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * adm_pessoa_id
 * Chave primária estrangeira de adm_pessoa.id.
 * Tipo: int     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * descricao
 * Descrição para o endereço (comercial, residencial, etc).
 * Tipo: varchar(25)     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * numero
 * Número do imóvel.
 * Tipo: varchar(25)     | Chave:     | Obrigatório: Não     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * rua
 * Rua, logradouro, avenida, etc. Dado sensível.
 * Tipo: varchar(255)     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * bairro
 * Bairro do imóvel. Dado sensível.
 * Tipo: varchar(255)     | Chave:     | Obrigatório: Não     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * cep
 * Código postal. Dado sensível.
 * Tipo: varchar(255)     | Chave:     | Obrigatório: Não     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * cidade
 * Nome da cidade.
 * Tipo: varchar(45)     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * uf
 * Código do estado no formato ISO 3166-2. Exemplo: SP
 * Tipo: varchar(2)     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * pais
 * Código do país no formato ISO 3166-1 alpha-2. Exemplo: BR
 * Tipo: varchar(2)     | Chave:     | Obrigatório: Sim     | Extra:
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */
class PessoaEndereco extends BaseApiModel
{

    public $timestamps = false;
    protected $table = "com_pessoa_endereco";
    protected $fillable = [
        "adm_pessoa_id",
        "adm_cidade_id",
        "descricao",
        "numero",
        "rua",
        "bairro",
        "cep",
        "complemento",
    ];

    protected $fillableRelations = [
        "cidade",
        "pessoa"
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
            return (new PessoaEnderecoResource($model))->toArray(request());
        };
    }

    protected static function boot()
    {
        parent::boot();
        PessoaEndereco::observe(PessoaEnderecoObserver::class);
    }

    // Regras de formulário e mensagens de erros na validação do formulário

    public function getEndPoint()
    {
        return config('config.api_agpadmin') . '/pessoa/' . $this->adm_pessoa_id . '/pessoa-endereco';
    }

    public function getRules()
    {
        return [
            "descricao" => "max:25|required",
            "numero" => "max:25|nullable",
            "rua" => "max:255|required",
            "bairro" => "max:255|nullable",
            "complemento" => "max:255|nullable",
            "cidade" => "required",
        ];
    }

    public function getMessages()
    {
        return [
            "descricao.required" => "A ''descrição'' do endereço é obrigatória.",
            "descricao.max" => "A ''descrição'' é muito grande.",
            "numero.max" => "O ''número'' da residência é muito grande.",
            "rua.required" => "O ''nome'' da rua é obrigatório.",
            "rua.max" => "O ''nome'' da rua é muito grande.",
            "bairro.max" => "O ''nome'' do bairro é muito grande.",
            "complemento.max" => "O ''complemento'' do endereço é muito grande.",
            "cidade.required" => "A ''cidade'' é obrigatória."
        ];
    }

    public function pessoa()
    {
        return $this->belongsTo('App\Model\Entity\Pessoa', 'adm_pessoa_id');
    }

    public function cidade()
    {
        return $this->belongsTo('App\Model\Entity\Cidade', 'adm_cidade_id');
    }

    public function setRuaAttribute($value)
    {
        $this->attributes['rua'] = encrypter($value, false);
    }

    public function getRuaAttribute($value)
    {
        return decryptor($value);
    }

    public function setBairroAttribute($value)
    {
        $this->attributes['bairro'] = encrypter($value, false);
    }

    public function getBairroAttribute($value)
    {
        return decryptor($value);
    }

    public function setCepAttribute($value)
    {
        $this->attributes['cep'] = encrypter($value, false);
    }

    public function getCepAttribute($value)
    {
        return decryptor($value);
    }

    public function setComplementoAttribute($value)
    {
        $this->attributes['complemento'] = encrypter($value, false);
    }

    public function getComplementoAttribute($value)
    {
        return decryptor($value);
    }


}
