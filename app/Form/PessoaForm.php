<?php
/**
 *
 * Data e hora: 2020-06-25 16:08:40
 * Form gerada automaticamente
 *
 */


namespace App\Form;


class PessoaForm extends BaseForm
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text', ['label' => 'Nome:',
                'attr' => [
                    'class' => 'form-control textodebug',
                    'placeholder' => 'Nome'
                ]])
            ->add('sobrenome', 'text', ['label' => 'Sobrenome:',
                'attr' => [
                    'class' => 'form-control textodebug',
                    'placeholder' => 'Sobrenome'
                ]])
            ->add('tipo_doc', 'choice', ['label' => 'Tipo Documento:',
                'attr' => [
                    'class' => 'form-control input-tipo-doc',
                ],
                'choices' => [1 => 'CPF', 2 => 'RG', 3 => 'Passaporte'],
                'selected' => function ($data) {
                    return is_null($data) ? 1 : $data;
                }
            ])
            ->add('doc', 'text', ['label' => 'Documento:',
                'attr' => [
                    'id' => 'doc',
                    'class' => 'form-control cpfdebug',
                    'placeholder' => 'Documento'
                ]
            ])
            ->add('sexo', 'choice', [
                'label' => 'Sexo:',
                'choices' => ['1' => 'Masculino', '2' => 'Feminino'],
                'wrapper' => false,
                'choice_options' => [
                    'wrapper' => false,
                ],
                'selected' => function ($data) {
                    return is_null($data) ? null : $data;
                },
                'expanded' => true
            ])
            ->add('email', 'text', ['label' => 'E-mail:',
                'attr' => [
                    'class' => 'form-control emaildebug',
                    'placeholder' => 'E-mail',
                ]])
            ->add('nascimento', 'date', [
                'label' => 'Data de nascimento:',
                'attr' => [
                    'class' => 'form-control nascimento',
                    'placeholder' => 'Data de nascimento'
                ]
            ])
            ->add('idioma', 'select', [
                'choices' => [1 => 'Português BR'],
                'label' => 'Idioma:',
                'selected' => '1',
            ])
            ->add('fuso', 'select', [
                'label' => 'Fuso horário',
                'choices' => [
                    '-12:00' => 'UTC -12',
                    '-11:00' => 'UTC -11',
                    '-10:00' => 'UTC -10',
                    '-09:00' => 'UTC -9',
                    '-08:00' => 'UTC -8',
                    '-07:00' => 'UTC -7',
                    '-06:00' => 'UTC -6',
                    '-05:00' => 'UTC -5',
                    '-04:00' => 'UTC -4',
                    '-03:00' => 'UTC -3',
                    '-02:00' => 'UTC -2',
                    '-01:00' => 'UTC -1',
                    '+00:00' => 'UTC 0',
                    '+01:00' => 'UTC +1',
                    '+02:00' => 'UTC +2',
                    '+03:00' => 'UTC +3',
                    '+04:00' => 'UTC +4',
                    '+05:00' => 'UTC +5',
                    '+06:00' => 'UTC +6',
                    '+07:00' => 'UTC +7',
                    '+08:00' => 'UTC +8',
                    '+09:00' => 'UTC +9',
                    '+10:00' => 'UTC +10',
                    '+11:00' => 'UTC +11',
                    '+12:00' => 'UTC +12'
                ],
                'selected' => function ($data) {
                    return is_null($data) ? '-03:00' : $data;
                }
            ])
            ->add('submit', 'submit', [
                'wrapper' => ['class' => 'form-group col-lg-12'],
                'attr' => ['class' => 'btn btn-success'],
                'label' => 'Salvar'
            ]);
    }
}
