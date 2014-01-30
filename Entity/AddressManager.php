<?php

namespace DCS\AddressBundle\Entity;

use DCS\AddressBundle\Model\AddressManager as BaseAddressManager;
use DCS\AddressBundle\Model\AddressInterface;

class AddressManager extends BaseAddressManager
{
    protected function doSaveAddress(AddressInterface $address)
    {
        $this->em->persist($address);
        $this->em->flush();
    }
}
