<?php
/**
 *
 * Data e hora: 2020-06-16 13:38:02
 * Repository gerada automaticamente
 *
 */


namespace App\Model\Repository;


use Agp\BaseUtils\Model\Repository\BaseRepository;
use Agp\Log\Log;
use App\Model\Entity\Usuario;


class UsuarioRepository extends BaseRepository
{
    protected $className = Usuario::class;

    public function __construct()
    {
        $this->hasAdmEmpresa = false;
    }

    public static function getAtividadeRecente()
    {
        return (new Log())->getAcessos();
    }

    public function getByEmail($email)
    {
        $email = encrypter($email,false);
        $r = Usuario::query()->where('email','=',$email)->limit(1)->get();
        if ($r->count() == 1)
            return ($r[0]);
        return false;
    }
}
