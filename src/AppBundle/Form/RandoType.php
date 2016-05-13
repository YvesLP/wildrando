<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RandoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('depart')
            ->add('arrivee')
            ->add('type')
            ->add('niveau')
            ->add('distance')
            ->add('duree', 'time')
            ->add('fickml')
//            ->add('filekml', 'file', array('label' => 'Fichier KML', 'required' => true))
//            ->add('photo')
            ->add('phrando', 'file', array('label' => 'Photo Randonnée', 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Rando'
        ));
    }
}
