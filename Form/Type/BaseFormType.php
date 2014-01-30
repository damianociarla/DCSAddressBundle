<?php

namespace DCS\AddressBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use DCS\AddressBundle\Model\AddressInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BaseFormType extends AbstractAddressFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('selectData', 'select_city', array(
                'country_required'  => $options['country_required'],
                'region_required'   => $options['region_required'],
                'city_required'     => $options['city_required'],
            ))
            ->add('county', 'text', array(
                'required' => $options['county_required'],
                'label' => 'form.label.county',
                'constraints' => $this->getConstraints($options['county_required']),
                'translation_domain' => 'DCSAddressBundle'
            ))
            ->add('countyCode', 'text', array(
                'required' => $options['countyCode_required'],
                'label' => 'form.label.countyCode',
                'constraints' => $this->getConstraints($options['countyCode_required']),
                'translation_domain' => 'DCSAddressBundle'
            ))
            ->add('street', 'text', array(
                'required' => $options['street_required'],
                'label' => 'form.label.street',
                'constraints' => $this->getConstraints($options['street_required']),
                'translation_domain' => 'DCSAddressBundle'
            ))
            ->add('streetNumber', 'text', array(
                'required' => $options['streetNumber_required'],
                'label' => 'form.label.streetNumber',
                'constraints' => $this->getConstraints($options['streetNumber_required']),
                'translation_domain' => 'DCSAddressBundle'
            ))
            ->add('zipCode', 'text', array(
                'required' => $options['zipCode_required'],
                'label' => 'form.label.zipCode',
                'constraints' => $this->getConstraints($options['zipCode_required']),
                'translation_domain' => 'DCSAddressBundle'
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'intention'             => 'base_address',
            'country_required'      => true,
            'region_required'       => true,
            'city_required'         => true,
            'county_required'       => true,
            'countyCode_required'   => true,
            'street_required'       => true,
            'streetNumber_required' => true,
            'zipCode_required'      => true,
        ));

        $resolver->setAllowedTypes(array(
            'country_required'      => 'bool',
            'region_required'       => 'bool',
            'city_required'         => 'bool',
            'county_required'       => 'bool',
            'countyCode_required'   => 'bool',
            'street_required'       => 'bool',
            'streetNumber_required' => 'bool',
            'zipCode_required'      => 'bool',
        ));
    }

    protected function getAddressType()
    {
        return AddressInterface::TYPE_BASE;
    }

    public function getName()
    {
        return 'dcs_address_base';
    }

    private function getConstraints($required)
    {
        if ($required) {
            return array(
                new \Symfony\Component\Validator\Constraints\NotBlank(),
            );
        }

        return array();
    }
}
