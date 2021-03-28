<?php

namespace App\Form;

use App\Entity\Address;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Quel nom souhaitez-vous donner à votre adresse ?',
                'attr' => [
                    'placeholder' => 'Saisir votre adresse'
                ]
            ])
            ->add('firstname',  TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Saisir votre prénom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Saisir votre nom'
                ]
            ])
            ->add('company',  TextType::class, [
                'label' => 'Société',
                'required' => false,
                'attr' => [
                    'placeholder' => '(Facultatif) Saisir le nom de votre société'
                ]
            ])
            ->add('address',  TextType::class, [
                'label' => 'Adresse',
                'attr' => [
                    'placeholder' => '24 rue des écoles...'
                ]
            ])
            ->add('postal',  TextType::class, [
                'label' => 'Code Postal',
                'attr' => [
                    'placeholder' => 'Saisir votre code postal'
                ]
            ])
            ->add('city',  TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => 'Saisir votre ville'
                ]
            ])
            ->add('country', CountryType::class, [
                'label' => 'Pays',
                'attr' => [
                    'placeholder' => 'Saisir votre pays'
                ]
            ])
            ->add('phone', TelType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'placeholder' => 'Saisir votre numéro téléphone'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Confirmer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
