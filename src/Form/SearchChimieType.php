<?php

namespace App\Form;

use App\Entity\NomFeuillet;
use App\Entity\DocumentChimie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchChimieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /* $builder
            ->add('nomFeuillet',EntityType::class,['class' => NomFeuillet::class , 'choice_label' => 'libelle'])
        ; */
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DocumentChimie::class,
        ]);
    }
}
