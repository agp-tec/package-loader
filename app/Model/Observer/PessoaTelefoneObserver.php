<?php
/**
 *
 * Data e hora: 2021-01-05 17:04:22
 * Model/Observer gerada automaticamente
 *
 */


namespace App\Model\Observer;


use Agp\BaseUtils\Model\Observer\BaseObserver;
use App\Utils\Log;


class PessoaTelefoneObserver extends BaseObserver
{
    public function __construct()
    {
        //TODO Dados gerados automaticamente. Altere de acordo com os dados da entidade PessoaTelefone
        $this->nome = 'Pessoa Telefone';
        $this->campo = 'descricao';
        $this->genero = 'o';
    }


}