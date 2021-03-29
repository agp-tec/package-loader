<?php
/**
 *
 * Data e hora: 2020-06-26 21:06:16
 * Service gerada automaticamente
 *
 */


namespace App\Model\Service;


use Agp\BaseUtils\Model\Service\BaseService;
use App\Model\Entity\Cliente;
use App\Model\Entity\Empresa;
use App\Model\Entity\Pessoa;

class ClienteService extends BaseService
{
    /** Cria registro de pessoa empresa em pag_cliente
     * @param Pessoa $pessoa
     * @param Empresa $empresa
     */
    public static function vinculaPessoaEmpresa($pessoa, $empresa)
    {
        $cliente = new Cliente([
            'adm_pessoa_id' => $pessoa->getKey(),
            'adm_empresa_id' => $empresa->getKey(),
        ]);
        try {
            $cliente->save();
        } catch (\Throwable $exception) {
            //Ignora excecao de duplicate key
        }
    }
}
