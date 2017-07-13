<?php

namespace GccpBundle\Form;

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
            'data_class' => 'GccpBundle\Entity\ClientsTaches'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gccpbundle_clientstaches';
    }


}
