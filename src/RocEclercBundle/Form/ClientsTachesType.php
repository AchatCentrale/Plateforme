<?php

namespace RocEclercBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
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
                'class' => 'RocEclercBundle\Entity\ActionType',
                "choice_label" => 'acNom',
                "label" => "Type d'action",
                "attr" => ["class" => "ui dropdown add-action"]
            ])
            ->add('claNom', TextType::class, [
                "label" => "Nom de l'action",
                "attr" => [
                    "class" => "add-action",
                    "id" => "validation-input-desc"


                ]
            ])
            ->add('claDescr', TextareaType::class, [
                "label" => "Description de l'action",

                "attr" => [
                    "class" => "ui dropdown add-action",
                    "data" => "test"

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
                'class' => "RocEclercBundle\Entity\Users",
                'choice_label' => "usPrenom",
                'placeholder' => 'Utilisateur affecté a la tache',
                'label' => "Affectation",
                "attr" => ["class" => "ui dropdown add-action"],
            ])
            ->add('clId', EntityType::class, [
                'class' => 'RocEclercBundle\Entity\Clients',
                'choice_label' => 'clRaisonsoc',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->select('u.clRaisonsoc')
                        ->orderBy('u.clRaisonsoc');
                },
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
            'data_class' => 'RocEclercBundle\Entity\ClientsTaches'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'roceclercbundle_clientstaches';
    }


}
