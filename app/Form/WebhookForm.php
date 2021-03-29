<?php
/**
 *
 * Data e hora: 2020-09-05 15:34:37
 * Form gerada automaticamente
 *
 */


namespace App\Form;


class WebhookForm extends BaseForm
{
    public function buildForm()
    {
        $this
            ->add('url', 'text', [
                'label' => false,//'Url'
            ])
            ->add('situacao', 'checkbox', [
                'label' => false,//'Situacao'
            ])
            ->add('webhookEventos', 'collection', [
                'type' => 'form',
                'property' => 'nome', //Trocar pelo campo a ser mostrado no formulario
                'options' => [
                    'label' => false,//'Aplicativo',
                    'class' => 'App\Form\WebhookEventoForm',
                ],
            ])
            ->add('submit', 'submit', ['label' => 'Salvar']);
    }
}
