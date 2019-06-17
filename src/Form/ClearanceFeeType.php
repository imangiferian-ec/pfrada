<?php

namespace App\Form;

use App\Entity\ClearanceFee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClearanceFeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('voterFeeAmount')
            ->add('nonVoterFeeAmount')
            ->add('clearancePurpose')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClearanceFee::class,
        ]);
    }
}
