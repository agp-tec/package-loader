<?php


namespace App\Form;


class PessoaTelefoneForm extends BaseForm
{
    public function buildForm()
    {
        $this
            ->add('ddd', 'hidden')
            ->add('numero', 'hidden')
            ->add('telefone', 'tel', [
                'label' => 'Telefone:',
                'attr' => ['class' => 'form-control celular']
            ])
            ->add('descricao', 'text', [
                'label' => 'Descrição:'
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'form-group col-lg-12'],
                'attr' => ['class' => 'btn btn-success'],
                'label' => 'Salvar'
            ]);

    }
}