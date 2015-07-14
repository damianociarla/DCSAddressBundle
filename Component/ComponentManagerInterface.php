<?php

namespace DCS\AddressBundle\Component;

use DCS\AddressBundle\Model\AddressInterface;

interface ComponentManagerInterface
{
    /**
     * Get the path of final model class
     *
     * @return string
     */
    public function getModelClass();

    /**
     * Create an empty instance of the AddressComponentInterface
     *
     * @return AddressComponentInterface
     */
    public function create();

    /**
     * Save the AddressComponent
     *
     * @param AddressComponentInterface $addressComponent
     * @param boolean $andFlush
     */
    public function save(AddressComponentInterface $addressComponent, $andFlush = true);

    /**
     * Find one component by address
     *
     * @param AddressInterface $address
     * @return AddressComponentInterface|null
     */
    public function findOneByAddress(AddressInterface $address);
}