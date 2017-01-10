<?php

namespace AchatCentrale\CrmBundle\Form;

use Symfony\Component\Form\AbstractType;
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
            ->add('clRef', TextType::class, array("label" => "La reference client"))
            ->add('clRaisonsoc', TextType::class, array("label" => "La raison sociale du client"))
            ->add('clSiret', TextType::class, array("label" => "Le numero de siret"))
            ->add('clAdresse1', TextType::class, array("label" => "L'adresse du client"))
            ->add('clAdresse2', TextType::class, array("label" => "L'adresse du client"))
            ->add('clCp', NumberType::class, array("label" => "Le code postal du client"))
            ->add('clVille')
            ->add('clPays')
            ->add('clTel')
            ->add('clFax')
            ->add('clMail')
            ->add('clWeb')
            ->add('clLogo')
            ->add('clPrescript')
            ->add('clTarif')
            ->add('clStatus')
            ->add('clAdhesion')
            ->add('clActivite')
            ->add('clGroupe')
            ->add('clClassif')
            ->add('clEffectif')
            ->add('clCa')
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
