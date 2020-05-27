<?php

namespace App\Form;

use App\Entity\NomFeuillet;
use App\Entity\DocumentChimie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class DocChimieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroFeuillet')
            ->add('identifiant')
            ->add('coordonneX')
            ->add('coordonneY')
            ->add('teneur')
            ->add('NomRoche')
            /* ->add('nomFeuillet',EntityType::class,['class' => NomFeuillet::class , 'choice_label' => 'libelle']) */
            ->add('fileName' ,FileType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DocumentChimie::class,
        ]);
    }
}
