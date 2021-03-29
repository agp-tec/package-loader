<?php
/**
 *
 * Data e hora: 2020-09-05 15:34:38
 * Form gerada automaticamente
 *
 */


namespace App\Form;


class WebhookEventoForm extends BaseForm
{
    public function buildForm()
    {
        $this
            ->add('id', 'number', [
                'label' => false,//'Evento'
            ])
            ->add('evento', 'text', [
                'label' => false,//'Evento'
            ]);
    }
}
