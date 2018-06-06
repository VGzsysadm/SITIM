<?php

namespace App\Form;

use App\Entity\User;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Validator\Constraints\IsTrue;

class UserEdit extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array( 'required' => 'required', 'attr' => array( 'class' => 'form-control', 'autofocus' => 'autofocus','placeholder' => 'Username')))
            ->add('email', EmailType::class, array( 'required' => 'required', 'attr' => array( 'class' => 'form-control','placeholder' => 'Email')))
            ->add('isActive', CheckboxType::class, array( 'label' => 'Activate user', 'required' => false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
