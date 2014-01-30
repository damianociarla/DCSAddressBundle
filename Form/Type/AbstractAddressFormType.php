<?php

namespace DCS\AddressBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

abstract class AbstractAddressFormType extends AbstractType
{
    protected $className;

    public function __construct($className)
    {
        $this->className = $className;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $type = $this->getAddressType();

        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) use ($type) {
            $data = $event->getData();
            $data->setType($type);
        });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->className,
        ));
    }

    abstract protected function getAddressType();
}
