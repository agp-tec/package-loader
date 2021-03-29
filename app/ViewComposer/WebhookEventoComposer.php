<?php


namespace App\ViewComposer;


use App\Helper\Datatable;
use App\Helper\DatatableJSData;

/**
 * Class WebhookEventoComposer
 * Contém os fragmentos de layout relacionados a webhook_evento
 * @package App\ViewComposer
 */
class WebhookEventoComposer
{
    /**
     * Retorna as ações da listagem
     *
     * @param mixed $webhookEvento Entidade webhook_evento ou null caso render == true
     * @param bool $render Se true, retorna o html com wildcards para ser substituido no JS da datatable
     * @return DatatableJSData|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public static function getActions($webhook_evento, $render) {
        if ($render) {
            $res = new DatatableJSData();
            $res->data = view('webhook-evento.actions', compact('webhook_evento'))->render();
            return $res;
        }
        return view('webhook-evento.actions',compact('webhook_evento'));
    }

    public static function getDatatable($id = 'webhook_evento') {
        $datatable = new Datatable($id,false);
        $datatable->addIDColumn();
        //TODO Dados gerados automaticamente. Altere de acordo com os dados da entidade WebhookEvento
        WebhookEventoComposer::setColumnNomeDatatable($datatable);
        $datatable->addActions('Ações')
            ->set('width',150)
            ->set('textAlign','center');
        $datatable->setAjaxUrl(route('web.webhook-evento.datatable'));
        return view('webhook-evento.datatable',compact('datatable'));
    }

    private static function setColumnNomeDatatable(&$datatable) {
        $datatable->addColumn('nome','Nome')
            ->set('autoHide',false)
            ->set('sortable','asc')
            ->set('width',400);
    }
}
