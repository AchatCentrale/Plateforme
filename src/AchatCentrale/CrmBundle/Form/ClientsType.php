<?php

namespace AchatCentrale\CrmBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clRef', TextType::class, array(
                "label" => "La reference client",
                "required" => false
            ))
            ->add('clRaisonsoc', TextType::class, array(
                "label" => "La raison sociale du client",
                "required" => false
            ))
            ->add('clSiret', TextType::class, array(
                "label" => "Le numero de siret",
                "required" => false
            ))
            ->add('clAdresse1', TextType::class, array(
                "label" => "L'adresse du client",
                "required" => false
            ))
            ->add('clAdresse2', TextType::class, array(
                "label" => "L'adresse du client",
                "required" => false
            ))
            ->add('clCp', NumberType::class, array(
                "label" => "Le code postal du client",
                "required" => false
            ))
            ->add('clVille', TextType::class, array(
                "label" => "La ville du client",
                "required" => false
            ))
            ->add('clTel', NumberType::class, array(
                "label" => "Le numero de téléphone du client",
                "required" => false
            ))
            ->add('clFax', TextType::class, array(
                "label" => "Le fax du client",
                "required" => false
            ))
            ->add('clMail', EmailType::class, array(
                "label" => "Le Mail du client",
                "required" => false
            ))
            ->add('clWeb', TextType::class, array(
                "label" => "Ladresse du site web du client",
                "required" => false
            ))
            ->add('clEffectif', NumberType::class, array(
                'label' => "L'effectif de l'entreprise",
                "required" => false
            ))
//            ->add('clActivite', EntityType::class, array(
//                'class' => 'AchatCentrale\CrmBundle\Entity\Activites',
//                'choice_label' => 'acDescr',
//            ))
//            ->add('clGroupe', EntityType::class, array(
//                'class' => 'AchatCentrale\CrmBundle\Entity\Groupe',
//                'choice_label' => 'grDescr',
//            ))
//            ->add('clPays', EntityType::class, array(
//                'class' => 'AchatCentrale\CrmBundle\Entity\Pays',
//                'choice_label' => 'paDescr',
//            ))
            ->add('clCa', NumberType::class, array(
                'label' => "Le chiffre d'affaire de l'entreprise",
                "required" => false
            ))
            ->add('Send', SubmitType::class, array(
            "attr" => array(
                "class" => "ink-button green",
            )))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AchatCentrale\CrmBundle\Entity\Clients'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'achatcentrale_crmbundle_clients';
    }


}
