<?php

namespace AchatCentrale\CrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('usPrenom', TextType::class, array("label" => "Votre prénom"))
            ->add('usNom',TextType::class, array("label" => "Votre nom"))
            ->add('usMail', TextType::class, array("label" => "Votre Mail"))
            ->add('usPass', PasswordType::class, array("label" => "Votre mot de passe"))
            ->add('Send', SubmitType::class, array(
                "attr" => array(
                    "class" => "ink-button green",
                    "value" => " Mettre a jour"
                )))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AchatCentrale\CrmBundle\Entity\Users'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'achatcentrale_crmbundle_users';
    }


}
