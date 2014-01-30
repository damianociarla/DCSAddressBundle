<?php

namespace DCS\AddressBundle\Form\Factory;

use Symfony\Component\Form\FormFactoryInterface;

class FormFactory implements FactoryInterface
{
    private $formFactory;
    private $name;
    private $type;

    public function __construct(FormFactoryInterface $formFactory, $name, $type)
    {
        $this->formFactory = $formFactory;
        $this->name = $name;
        $this->type = $type;
    }

    public function createForm()
    {
        return $this->formFactory->createNamed($this->name, $this->type);
    }
}
