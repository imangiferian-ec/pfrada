<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\RolesFunctionPermission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class RolesFunctionPermissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('functionName')
            ->add('route')
            ->add('label')
            ->add('permittedRoles', EntityType::class,
                  array('class'=>'App\Entity\Role',
                'multiple'=>true,
                'expanded'=>true,
                'choice_value' => 'name',
              ))
            ->add('position')
            ->add('isActive')
            ->add('isSideMenu')
            ->add('module')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RolesFunctionPermission::class,
        ]);
    }
}
