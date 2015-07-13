<?php

namespace DCS\AddressBundle\Component;

use DCS\AddressBundle\Model\AddressInterface;

trait AddressComponent
{
    /**
     * @var AddressInterface
     */
    protected $address;

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress(AddressInterface $address)
    {
        $this->address = $address;
        return $this;
    }
}