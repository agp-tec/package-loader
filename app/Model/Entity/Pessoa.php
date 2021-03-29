<?php
/**
 *
 * Data e hora: 2020-06-25 16:08:40
 * Model gerada automaticamente
 *
 */


namespace App\Model\Entity;

use Agp\BaseUtils\Model\Entity\BaseApiModel;
use App\Helper\Helper;
use App\Model\Observer\PessoaObserver;
use App\Model\Resource\PessoaResource;


/**
 * Model Pessoa
 * Tabela: pag_pessoa
 * Comentario: VIEW
 */
class Pessoa extends BaseApiModel
{
    /**
     * Dicionáro de dados:
     * id
     * Chave primária, auto incremental.
     * Tipo: int     | Chave:     | Obrigatório: Sim     | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * adm_pessoa_id
     * Chave primária, auto incremental.
     * Tipo: int     | Chave:     | Obrigatório: Sim     | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * imagem
     * Imagem de perfil da pessoa.
     * Tipo: varchar(10)     | Chave:     | Obrigatório: Não     | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * nome
     * Primeiro nome.
     * Tipo: varchar(25)     | Chave:     | Obrigatório: Sim     | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * sobrenome
     * Sobrenome.
     * Tipo: varchar(25)	 | Chave: 	 | Obrigatório: Não	 | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * tipo_doc
     * Tipo de documento. (1 = CPF, 2 = RG, 3 = PASSAPORTE). A implementar sequencia para documentos internacionais.
     * Tipo: smallint	 | Chave: 	 | Obrigatório: Não	 | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * doc
     * Dado sensível. Documento pessoal.
     * Tipo: varchar(255)	 | Chave: 	 | Obrigatório: Não	 | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * email
     * Dado sensível. E-mail pessoal.
     * Tipo: varchar(255)	 | Chave: 	 | Obrigatório: Não	 | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * nascimento
     * Data de nascimento da pessoa.
     * Tipo: date	 | Chave: 	 | Obrigatório: Não	 | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * sexo
     * Sexo da pessoa sendo 1 para homem e 2 para mulher.
     * Tipo: tinyint	 | Chave: 	 | Obrigatório: Não	 | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * idioma
     * Contém o idioma da pessoa. 1 para default (BR). Implementar novas linguagens.
     * Tipo: tinyint	 | Chave: 	 | Obrigatório: Não	 | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * fuso
     * Timezone do usuário no formato "+00:00".
     * Tipo: varchar(6)	 | Chave: 	 | Obrigatório: Não	 | Extra:
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     */
    protected $table = "com_pessoa";
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        "id",
        "adm_empresa_id",
        "imagem",
        "nome",
        "sobrenome",
        "tipo_doc",
        "doc",
        "email",
        "nascimento",
        "sexo",
        "idioma",
        "fuso",
    ];
    protected $fillableRelations = [
        "enderecos",
        "telefones",
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        //Api base model
        $this->app = config('config.id_app');
        if (auth()->check() && (auth()->user()->getAdmEmpresaId())) {
            $this->endpoint = config('config.api_agpadmin') . '/pessoa';
            $this->authorization = 'bearer ' . auth()->getToken();
        } else {
            $this->endpoint = config('config.api_agpadmin') . '/public/pessoa';
            $this->client_token = config('config.api_client_token');
        }
        $this->resourceClosure = function ($model) {
            return (new PessoaResource($model))->toArray(request());
        };
    }

    public function getRules()
    {
        return [
            "nome" => "max:25|required",
            "sobrenome" => "max:25|nullable",
            "tipo_doc" => "integer|nullable",
            "doc" => "max:255|nullable",
            "email" => "max:255|nullable",
            "nascimento" => "date|nullable",
            "sexo" => "integer|nullable",
            "idioma" => "integer|nullable",
            "fuso" => "max:6|nullable",
            "imagem" => "max:25|nullable",
            "imagemLink" => "max:255|nullable",
        ];
    }

    public function getMessages()
    {
        return [
            "nome.required" => "O ''Nome'' é obrigatório",
            "nome.max" => "O ''Nome'' é muito grande",
            "sobrenome.max" => "O ''Sobrenome'' é muito grande",
            "email.required" => "O ''Email'' é obrigatório",
            "email.max" => "O ''Email'' é muito grande",
            "doc.required" => "O ''Documento'' é obrigatório",
            "doc.cpf" => "Digite um ''CPF'' válido",
        ];
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'adm_pessoa_id')
            ->where('adm_empresa_id', '=', auth()->user()->getAdmEmpresaId());
    }

    public function empresa()
    {
        return $this->hasOne(Empresa::class, 'id', 'adm_empresa_id');
    }

    public function enderecos()
    {
        return $this->hasMany(PessoaEndereco::class, 'adm_pessoa_id');
    }

    public function telefones()
    {
        return $this->hasMany(PessoaTelefone::class, 'adm_pessoa_id');
    }

    protected static function boot()
    {
        parent::boot();
        Pessoa::observe(PessoaObserver::class);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = encrypter($value, false);
    }

    public function getEmailAttribute($value)
    {
        return decryptor($value);
    }

    public function setDocAttribute($value)
    {

        $this->attributes['doc'] = encrypter($value, false);
    }

    public function getDocAttribute($value)
    {
        return decryptor($value);
    }

    public function getImagemLink($width = 48, $fullPatch = false)
    {
        if ($this->imagem != '')
            return ($fullPatch ? config('app.url') : '') . '/imagens/' . $this->imagem;
        return Helper::getAvatarUrl($this->email, $width);
    }

    public static function getImagemLink_($imagem, $email)
    {
        if ($imagem != '')
            return config('app.url') . '/imagens/' . $imagem;
        return Helper::getAvatarUrl($email, 128);
    }

}
