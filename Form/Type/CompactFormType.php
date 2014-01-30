<?php

namespace DCS\AddressBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use DCS\AddressBundle\Model\AddressInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompactFormType extends AbstractAddressFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('completeAddress', 'geocode', array(
                'required' => false,
                'callback' => 'handlerGeocode',
                'label' => 'form.label.completeAddress',
                'translation_domain' => 'DCSAddressBundle',
            ))
            ->add('point', 'point', array(
                'functionFillFromGoogleResult' => 'handlerGeocode',
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'intention' => 'compact_address',
        ));
    }

    protected function getAddressType()
    {
        return AddressInterface::TYPE_COMPACT;
    }

    public function getName()
    {
        return 'dcs_address_compact';
    }
}
