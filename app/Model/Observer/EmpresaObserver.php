<?php
/**
 *
 * Data e hora: 2020-09-16 12:46:08
 * Model/Observer gerada automaticamente
 *
 */


namespace App\Model\Observer;


use Agp\BaseUtils\Model\Observer\BaseObserver;

class EmpresaObserver extends BaseObserver
{
    public function __construct()
    {
        $this->nome = 'Empresa';
        $this->campo = 'nome';
        $this->genero = 'o';
    }


}
