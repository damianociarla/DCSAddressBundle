<?php

namespace DCS\AddressBundle\Resolver;

use DCS\AddressBundle\Component\AddressComponentInterface;
use DCS\AddressBundle\Model\AddressInterface;

interface ResolverInterface
{
    /**
     * Find the address component
     *
     * @param AddressInterface $address
     * @return AddressComponentInterface|null
     */
    public function resolve(AddressInterface $address);
}