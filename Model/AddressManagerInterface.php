<?php

namespace DCS\AddressBundle\Model;

interface AddressManagerInterface
{
    /**
     * Get the path of final model class
     *
     * @return string
     */
    public function getModelClass();

    /**
     * Create an empty instance of the AddressInterface
     *
     * @param string $alias
     * @return AddressInterface
     */
    public function create($alias);

    /**
     * Save the AddressComponent
     *
     * @param AddressInterface $address
     */
    public function save(AddressInterface $address);

    /**
     * Find one address by id
     *
     * @param mixed $id
     * @return AddressInterface|null
     */
    public function findOneById($id);
}