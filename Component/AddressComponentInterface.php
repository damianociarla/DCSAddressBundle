<?php

namespace DCS\AddressBundle\Component;

use DCS\AddressBundle\Model\AddressInterface;

interface AddressComponentInterface
{
    /**
     * Get address
     *
     * @return AddressInterface
     */
    public function getAddress();

    /**
     * Set address
     *
     * @param AddressInterface $address
     * @return AddressComponentInterface
     */
    public function setAddress(AddressInterface $address);
}