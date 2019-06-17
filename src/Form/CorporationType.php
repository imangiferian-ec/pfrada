<?php

namespace App\Form;

use App\Entity\Corporation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CorporationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('businessName')
            ->add('dateRegistered')
            ->add('birNo')
            ->add('tinNo')
            ->add('philgeps')
            ->add('ownerName')
            ->add('contactPersonName')
            ->add('emailOfContactPerson')
            ->add('contactNo')
            ->add('businessType')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Corporation::class,
        ]);
    }
}
