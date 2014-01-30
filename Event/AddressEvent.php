<?php

namespace DCS\AddressBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use DCS\AddressBundle\Model\AddressInterface;

class AddressEvent extends Event
{
    protected $address;

    public function __construct(AddressInterface $address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return \DCS\AddressBundle\Model\AddressInterface
     */
    public function getAddress()
    {
        return $this->address;
    }
}
