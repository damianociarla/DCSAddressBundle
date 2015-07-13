<?php

namespace DCS\AddressBundle\Model;

use DCS\AddressBundle\Component\AddressComponentInterface;

interface AddressComponentInjectorInterface
{
    /**
     * Set component
     *
     * @param AddressComponentInterface $component
     */
    public function setComponent(AddressComponentInterface $component);
}