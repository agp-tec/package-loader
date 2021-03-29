<?php
/**
 *
 * Data e hora: 2021-01-05 16:54:22
 * Model/Observer gerada automaticamente
 *
 */


namespace App\Model\Observer;


use Agp\BaseUtils\Model\Observer\BaseObserver;
use App\Utils\Log;


class PessoaEnderecoObserver extends BaseObserver
{
    public function __construct()
    {
        //TODO Dados gerados automaticamente. Altere de acordo com os dados da entidade PessoaEndereco
        $this->nome = 'Pessoa Endereco';
        $this->campo = 'descricao';
        $this->genero = 'o';
    }


}