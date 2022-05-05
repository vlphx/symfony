<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use App\Form\ChassisFormType;
use App\Form\MoteurFormType;

use App\Form\CollectionFormType;

class VehiculeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('modele')
            ->add('Chassis', ChassisFormType::class)
            ->add('Moteur', MoteurFormType::class)
            ->add('Roues', CollectionType::class, array(
                'entry_type' => RoueFormType::class,
                'allow_add' => true,
                'allow_delete' => true
            ))
            // ->add('Couleur')
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
