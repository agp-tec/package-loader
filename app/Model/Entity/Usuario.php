<?php

namespace App\Model\Entity;

use Agp\BaseUtils\Traits\SyncRelations;
use Agp\Login\Model\Service\UsuarioService;
use Agp\Notification\Traits\Notifiable;
use App\Helper\Helper;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable implements JWTSubject
{

    use Notifiable, SyncRelations;

    public $synchronized = false;

    protected $table = 'com_usuario';

    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['email', 'nome', 'sobrenome'];

    public function getAdmEmpresaId()
    {
        return auth()->payload()["empresaId"];
    }

    public function empresas()
    {
        return $this->belongsToMany(Empresa::class, 'adm_usuario_empresa', 'adm_pessoa_id', 'adm_empresa_id')->withPivot('superadmin');
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = encrypter($value, false);
    }

    public function getEmailAttribute($value)
    {
        return decryptor($value);
    }

    public function setDoclAttribute($value)
    {
        $this->attributes['doc'] = encrypter($value, false);
    }

    public function getDocAttribute($value)
    {
        return decryptor($value);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getContas()
    {
        return (new UsuarioService)->getContas();
    }

    public function getContaAtual()
    {
        return (new UsuarioService)->getContaAtual();
    }

    public function getImagemLink($width = 48, $fullPatch = false)
    {
        if ($this->imagem != '')
            return ($fullPatch ? config('app.url') : '') . '/imagens/' . $this->imagem;
        return Helper::getAvatarUrl($this->email, $width);
    }

}
