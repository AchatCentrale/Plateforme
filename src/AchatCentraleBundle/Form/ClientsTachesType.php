<?php

namespace AchatCentraleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsTachesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('clId')->add('usId')->add('claType')->add('claNom')->add('claDescr')->add('claEcheance')->add('claPriorite')->add('claNotifRef')->add('claStatus')->add('insDate')->add('insUser')->add('majDate')->add('majUser');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AchatCentraleBundle\Entity\ClientsTaches'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'achatcentralebundle_clientstaches';
    }


}
