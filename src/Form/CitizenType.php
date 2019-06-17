<?php

namespace App\Form;

use App\Entity\Citizen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CitizenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname')
            ->add('firstname')
            ->add('middlename')
            ->add('extensionName', ChoiceType::class, [
                'choices'  => [
                      'Ext Name' => '',
                      'SR' => 'SR',
                      'JR' => 'JR',
                      'II' => 'II',
                      'III' => 'III',
                      'IV' => 'IV',
                      'V' => 'V',
                  ],
                  'empty_data' => '',
                  'required' => false
                ])
            ->add('maidenName')
            ->add('address')
            ->add('barangay', ChoiceType::class, [
                'choices'  => [
                      'North Daang Hari' => 'north daang hari',
                  ]])
            ->add('birthDate')
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                      'Male' => 'm',
                      'Female' => 'f',
                  ]])
            ->add('civilStatus', ChoiceType::class, [
                'choices'  => [
                      'Single' => 'single',
                      'Married' => 'married',
                      'Separated' => 'separated',
                      'Widow' => 'Widow',
                      'Widower' => 'Widower',
                  ]])
            ->add('email')
            ->add('citizenVoterID')
            ->add('isBrgyEmployee')
            ->add('contactNo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Citizen::class,
        ]);
    }
}
