<?php

namespace App\Form;

use App\Entity\Hardware;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HardwareType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Brand')
            ->add('Model')
            ->add('Hostname')
            ->add('CPU')
            ->add('RAM')
            ->add('Regdate')
            ->add('Owner')
            ->add('Seller')
            ->add('Location')
            ->add('SerialNumber')
            ->add('OfficeLicense')
            ->add('WindowsLicense')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Hardware::class,
        ]);
    }
}
