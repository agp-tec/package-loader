<?php


namespace App\ViewComposer;


use App\Helper\Datatable;
use App\Helper\DatatableJSData;

/**
 * Class WebhookComposer
 * Contém os fragmentos de layout relacionados a webhook
 * @package App\ViewComposer
 */
class WebhookComposer
{
    /**
     * Retorna as ações da listagem
     *
     * @param mixed $webhook Entidade webhook ou null caso render == true
     * @param bool $render Se true, retorna o html com wildcards para ser substituido no JS da datatable
     * @return DatatableJSData|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public static function getActions($webhook, $render) {
        if ($render) {
            $res = new DatatableJSData();
            $res->data = view('webhook.actions', compact('webhook'))->render();
            return $res;
        }
        return view('webhook.actions',compact('webhook'));
    }

    public static function getDatatable($id = 'webhook') {
        $datatable = new Datatable($id,false);
        $datatable->addIDColumn();
        //TODO Dados gerados automaticamente. Altere de acordo com os dados da entidade Webhook
        WebhookComposer::setColumnNomeDatatable($datatable);
        $datatable->addActions('Ações')
            ->set('width',150)
            ->set('textAlign','center');
        $datatable->setAjaxUrl(route('web.webhook.datatable'));
        return view('webhook.datatable',compact('datatable'));
    }

    private static function setColumnNomeDatatable(&$datatable) {
        $datatable->addColumn('nome','Nome')
            ->set('autoHide',false)
            ->set('sortable','asc')
            ->set('width',400);
    }
}
