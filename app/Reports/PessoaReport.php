<?php


namespace App\Reports;


use App\Model\Entity\Pessoa;
use App\ViewComposer\PessoaComposer;

class PessoaReport extends \Agp\Report\Report
{
    public function __construct()
    {
        parent::__construct();

        //SQL inicial
        $this->queryBuilder = function () {
            return Pessoa::query()->where(['adm_empresa_id' => auth()->user()->getAdmEmpresaId()]);
        };
        $this->addColumn("id")->setTitle("ID");
        $this->addColumn("nome")->setTitle("Nome")
            ->setFieldCallback(function ($item) {
                return PessoaComposer::getWidget($item);
            });
        $this->addColumn("nascimento")->setTitle("Nascimento");

    }
}
