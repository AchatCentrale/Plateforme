<?php

namespace SiteBundle\Form;

use AchatCentrale\CrmBundle\Entity\Clients;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
            ->add('usId')
            ->add('claType')
            ->add('claNom')
            ->add('claDescr')
            ->add('claEcheance')
            ->add('claPriorite')
            ->add('claNotifRef')
            ->add('insDate')
            ->add('insUser')
            ->add('majDate')
            ->add('majUser')
            ->add('save', SubmitType::class, array(
                'attr' => array('class' => 'save')))

           ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AchatCentrale\CrmBundle\Entity\ClientsTaches'
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
