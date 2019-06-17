<?php

namespace App\Form;

use App\Entity\BusinessPermitFee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BusinessPermitFeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('newApplicantCharge')
            ->add('renewalApplicantCharge')
            ->add('isForCitizen')
            ->add('businessType')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BusinessPermitFee::class,
        ]);
    }
}
