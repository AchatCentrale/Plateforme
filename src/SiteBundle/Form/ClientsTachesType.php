<?php

namespace SiteBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsTachesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('claType', EntityType::class, [
                'class' => 'AchatCentrale\CrmBundle\Entity\ActionType',
                "choice_label" => 'acNom',
                "label" => "Type d'action",
                "attr" => ["class" => "ui dropdown add-action"]
            ])
            ->add('claNom', TextType::class, [
                "label" => "Nom de l'action",
                "attr" => [
                    "class" => "add-action",
                    "size" => 140,

                    ]
            ])
            ->add('claDescr', TextareaType::class, [
                "label" => "Description de l'action",
                "attr" => [
                    "class" => "ui dropdown add-action",
                    "maxlength" => 140,
                ]
            ])
            ->add('claPriorite', ChoiceType::class, [
                'label' => "Priorité",
                "attr" => ["class" => "ui dropdown add-action"],
                'choices' => [
                    'A faire au plus vite' => 1,
                    'Important' => 2,
                    'Moyen' => 3,
                    'Faible' => 4,
                    'Un jour peut-être' => 5,
                ]])
            ->add('claEcheance', DateTimeType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy',
                'label' => "Date échéance",
                'attr' => [ 'class' => 'date add-action'],
                'model_timezone' => 'Europe/Paris',

            ])
            /*->add('claNotifRef', CheckboxType::class, [
                'label'    => 'Notifier le réferent',
                'required' => false,
            ])*/
            ->add('usId', EntityType::class, [
                'class' => "AchatCentrale\CrmBundle\Entity\Users",
                'choice_label' => "usPrenom",
                'placeholder' => 'Utilisateur affecté a la tache',
                'label' => "Affectation",
                "attr" => ["class" => "ui dropdown add-action"],
            ])
            ->add('cl', EntityType::class, [
                'class' => 'AchatCentrale\CrmBundle\Entity\Clients',
                'choice_label' => 'clRaisonsoc',


                'placeholder' => 'Choisir l\'entreprise',

                'label' => 'Entreprise (numéro/nom)',
                "attr" => ["class" => "ui dropdown add-action"]

            ])

        ;

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AchatCentrale\CrmBundle\Entity\ClientsTaches',
            'allow_extra_fields' => true,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id'   => 'task_item',
            'us'   => 2333,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'achatcentrale_crmbundle_clientstaches';
    }


}
