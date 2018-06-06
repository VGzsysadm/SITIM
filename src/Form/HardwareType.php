<?php

namespace App\Form;

use App\Entity\Hardware;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class HardwareType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Brand', ChoiceType::class, array( 'choices' => array(
                'Asus' => 'Asus',
                'Lenovo' => 'Lenovo',
                'Dell' => 'Dell',
                'HP' => 'HP',
                'Acer' => 'Acer',
                'Apple' => 'Apple',
                'MSI' => 'MSI',
                'Samsung' => 'Samsung',
                'Microsoft' => 'Microsoft',
                'Sony' => 'Sony',
                'Toshiba' => 'Toshiba',
                'Gigabyte' => 'Gigabyte',
                'LG' => 'LG',
                'Other' => 'Other',
            ), 'required' => 'required', 'attr' => array( 'class' => 'form-control')))
            ->add('Model', TextType::class, array( 'required' => 'required', 'attr' => array( 'class' => 'form-control', 'autofocus' => 'autofocus','placeholder' => 'Model')))
            ->add('Hostname', TextType::class, array( 'required' => 'required', 'attr' => array( 'class' => 'form-control', 'autofocus' => 'autofocus','placeholder' => 'Hostname')))
            ->add('CPU', ChoiceType::class, array( 'label' => 'CPU', 'choices' => array(
                'I3 4th GEN or less' => 'I3 4th GEN or less',
                'I5 4th GEN or less' => 'I5 4th GEN or less',
                'I7 4th GEN or less' => 'I7 4th GEN or less',
                'I3 5th GEN' => 'I3 5th GEN',
                'I3 6th GEN' => 'I3 6th GEN',
                'I3 7th GEN' => 'I3 7th GEN',
                'I3 8th GEN' => 'I3 8th GEN',
                'I5 5th GEN' => 'I5 5th GEN',
                'I5 6th GEN' => 'I5 6th GEN',
                'I5 7th GEN' => 'I5 7th GEN',
                'I5 8th GEN' => 'I5 8th GEN',
                'I7 5th GEN' => 'I7 5th GEN',
                'I7 6th GEN' => 'I7 6th GEN',
                'I7 7th GEN' => 'I7 7th GEN',
                'I7 8th GEN' => 'I7 8th GEN',
                'Intel Xeon' => 'Intel Xeon',
                'AMD Ryzen' => 'AMD Ryzen',
                'AMD APU' => 'AMD APU',
                'AMD Athlon' => 'AMD Athlon',
                'AMD FX' => 'AMD FX',
                'Other' => 'Other',
            ), 'required' => 'required', 'attr' => array( 'class' => 'form-control')))
            ->add('RAM', ChoiceType::class, array( 'label' => 'RAM', 'choices' => array(
                '4GB or less' => '4GB or less',
                '8GB' => '8GB',
                '16GB' => '16GB',
                '32GB' => '32GB',
                '64GB or more' => '64GB or more',
            ), 'required' => 'required', 'attr' => array( 'class' => 'form-control')))
            ->add('Regdate', DateType::class, array( 'required' => 'required', 'attr' => array( 'autofocus' => 'autofocus','placeholder' => 'Model')))
            ->add('Owner', TextType::class, array( 'required' => 'required', 'empty_data' => 'Not found', 'attr' => array( 'class' => 'form-control', 'autofocus' => 'autofocus','placeholder' => 'Owner')))
            ->add('Seller', TextType::class, array( 'required' => false, 'attr' => array( 'class' => 'form-control', 'autofocus' => 'autofocus','placeholder' => 'Default value: Not found')))
            ->add('Location', TextType::class, array( 'label' => 'Location', 'required' => 'required', 'attr' => array( 'class' => 'form-control', 'autofocus' => 'autofocus','placeholder' => 'Location')))
            ->add('SerialNumber', TextType::class, array( 'required' => 'required', 'attr' => array( 'class' => 'form-control', 'autofocus' => 'autofocus','placeholder' => 'Serial Number')))
            ->add('OfficeLicense', TextType::class, array( 'required' => false,'empty_data' => 'Not found', 'attr' => array( 'class' => 'form-control', 'autofocus' => 'autofocus','placeholder' => 'Default value: Not found')))
            ->add('WindowsLicense', TextType::class, array( 'required' => false, 'empty_data' => 'Not found', 'attr' => array( 'class' => 'form-control', 'autofocus' => 'autofocus','placeholder' => 'Default value: Not found')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Hardware::class,
        ]);
    }
}
