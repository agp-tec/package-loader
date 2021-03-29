<?php


namespace App\Form;


use App\Model\Entity\Cidade;

class PessoaEnderecoForm extends BaseForm
{
    public function buildForm()
    {
        $this
            ->add('pessoa', 'hidden')
            ->add('numero', 'tel', [
                'label' => 'Número da residência:',
                'attr' => ['id' => 'numero']
            ])
            ->add('rua', 'text', [
                'label' => 'Rua:',
                'attr' => [
                    'id' => 'rua',
                    'class' => 'form-control clear-on-cep-not-found'
                ]
            ])
            ->add('bairro', 'text', [
                'label' => 'Bairro:',
                'attr' => [
                    'id' => 'bairro',
                    'class' => 'form-control clear-on-cep-not-found'
                ]
            ])
            ->add('descricao', 'text', [
                'label' => 'Descrição:',
                'attr' => ['id' => 'descricao']
            ])
            ->add('complemento', 'text', [
                'label' => 'Complemento:',
                'attr' => [
                    'id' => 'complemento',
                    'class' => 'form-control clear-on-cep-not-found',
                ]
            ])
            ->add('cep', 'text', [
                'label' => 'CEP:',
                'attr' => ['class' => 'form-control cep', 'id' => 'cep']
            ])
            ->add('cidade', 'entity', [
                'label' => 'Cidade:',
                'class' => Cidade::class,
                'property' => 'nome',
                'selected' => $this->getModel()->cidade ? $this->getModel()->cidade->id : null,
                'attr' => [
                    'id' => 'cidade',
                    'class' => 'form-control select2-ajax clear-on-cep-not-found',
                    'data-url' => route('web.cidade.find'),
                    'placeholder' => 'Selecione a cidade',
                ]
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'form-group col-lg-12'],
                'attr' => ['class' => 'btn btn-success'],
                'label' => 'Salvar'
            ]);

    }
}