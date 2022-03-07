<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormularioArticuloType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titulo')
            ->add('fecha', DateType::class)
            ->add('texto')
            ->add('comentario')
            ->add('resumen')
            ->add('categoria', ChoiceType::class,
                [
                    'choices' => [
                        'Opinion' => 'Opinion',
                        'Reportaje' => 'Reportaje',
                        'Divulgacion' => 'Divulgacion',
                        'Informativo' => 'Informativo',
                        'Editorial' => 'Editorial',
                        'Columna' => 'Columna',
                    ]
                ])
            ->add('url', UrlType::class)
            ->add('medio', ChoiceType::class, [
                'choices' => [
                    'Papel' => 'Papel',
                    'Digital' => 'Digital',
                ]
            ])
            ->add('guardar', SubmitType::class, ['label' => 'Guardar']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
