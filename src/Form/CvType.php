<?php

namespace App\Form;

use App\Entity\Cv;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array('label' => 'Nom', 'attr' => array('class' => 'form-control form-group')))
            ->add('prenom',TextType::class, array('label' => 'Prénom', 'attr' => array('class'=>'form-control form-group')))
            ->add('age',IntegerType::class,array('label' => 'Age', 'attr' => array('class'=>'form-control form-group')))
            ->add('telephone', TextType::class, array('label' => 'Téléphone', 'attr' => array('class'=>'form-control form-group')))
            ->add('adresse', TextType::class, array('label' => 'Adresse', 'attr' => array('class'=>'form-control form-group')))
            ->add('niveauEtude', TextType::class, array('label' => 'Niveau etude', 'attr' => array('class'=>'form-control form-group')))
            ->add('experiencePro', TextType::class, array('label' => 'Experience professionnelle', 'attr' => array('class'=>'form-control form-group')))
            ->add('offre')
            ->add('submit',SubmitType::class, array('label'=>'Envoyer','attr' => array('class' => 'btn btn-secondary form-group')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cv::class,
        ]);
    }
}
