<?php

namespace App\Form;

use App\Entity\NomFeuillet;
use App\Entity\RessourcesMinerales;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class RessourcesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fileName',FileType::class)
            /* ->add('nomFeuillet',EntityType::class,['class' => NomFeuillet::class , 'choice_label' => 'libelle']) */
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RessourcesMinerales::class,
        ]);
    }
}
