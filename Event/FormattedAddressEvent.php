<?php

namespace DCS\AddressBundle\Event;

use DCS\AddressBundle\Model\AddressInterface;
use Symfony\Component\EventDispatcher\Event;

class FormattedAddressEvent extends Event
{
    private $address;
    private $formattedAddress;

    public function __construct(AddressInterface $address)
    {
        $this->address = $address;
        $this->formattedAddress = '';
    }

    /**
     * Get address
     *
     * @return AddressInterface
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get formattedAddress
     *
     * @return string
     */
    public function getFormattedAddress()
    {
        return $this->formattedAddress;
    }

    /**
     * Set formattedAddress
     *
     * @param string $formattedAddress
     */
    public function setFormattedAddress($formattedAddress)
    {
        $this->formattedAddress = $formattedAddress;
    }
}