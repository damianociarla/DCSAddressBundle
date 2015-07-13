<?php

namespace DCS\AddressBundle\Form;

use DCS\AddressBundle\Model\AddressInterface;
use DCS\AddressBundle\Model\AddressManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;

class AddressFormFactory
{
    private $formName;
    private $formFactory;
    private $addressManager;

    public function __construct($formName, FormFactoryInterface $formFactory, AddressManagerInterface $addressManager)
    {
        $this->formName = $formName;
        $this->formFactory = $formFactory;
        $this->addressManager = $addressManager;
    }

    public function createFromAddress(AddressInterface $address)
    {
        return $this->formFactory->create($this->formName, $address);
    }

    public function createFromAlias($alias)
    {
        $address = $this->addressManager->create($alias);
        return $this->createFromAddress($address);
    }
}