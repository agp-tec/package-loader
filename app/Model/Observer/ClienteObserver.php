<?php
/**
 *
 * Data e hora: 2020-06-26 21:06:16
 * Observer gerada automaticamente
 *
 */


namespace App\Model\Observer;


use Agp\BaseUtils\Model\Observer\BaseObserver;
use App\Exception\CustomUnauthorizedException;
use App\Model\Entity\Cliente;


class ClienteObserver extends BaseObserver
{
    public function __construct()
    {
        $this->nome = 'Cliente';
        $this->campo = 'nome';
        $this->genero = 'o';
    }

    public function creating(Cliente $cliente)
    {
        if (auth()->check())
            $cliente->adm_empresa_id = auth()->user()->getAdmEmpresaId();
    }

    public function retrieved(Cliente $cliente)
    {
        if (!$cliente->validUserRegistry())
            throw new CustomUnauthorizedException();
    }
}
