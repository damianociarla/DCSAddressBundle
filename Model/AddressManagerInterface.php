<?php

namespace DCS\AddressBundle\Model;

interface AddressManagerInterface
{
    /**
     * Save or update address
     *
     * @param \DCS\AddressBundle\Model\AddressInterface $address
     */
    public function saveAddress(AddressInterface $address);
}
