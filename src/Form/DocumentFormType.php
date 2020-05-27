<?php

namespace App\Form;


use App\Entity\Zone;
use App\Entity\Document;
use App\Entity\NomFeuillet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DocumentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class)
            ->add('domainEtude',TextType::class)
            ->add('autheurIndividue',TextType::class)
            ->add('autheurCompanie',TextType::class)
            ->add('numeroFeuillet',TextType::class)
            
            ->add('fileName' ,FileType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
        ]);
    }
}
