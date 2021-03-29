<?php
/**
 *
 * Data e hora: 2020-06-25 16:08:40
 * Observer gerada automaticamente
 *
 */


namespace App\Model\Observer;


use Agp\BaseUtils\Model\Observer\BaseObserver;
use App\Jobs\PessoaWebhook;


class PessoaObserver extends BaseObserver
{
    public function __construct()
    {
        $this->modelName = 'pessoa';
        $this->webhookClass = PessoaWebhook::class;
        $this->nome = 'Pessoa';
        $this->campo = 'nome';
        $this->genero = 'a';
    }

}
