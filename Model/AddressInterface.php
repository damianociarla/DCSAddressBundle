<?php

namespace DCS\AddressBundle\Model;

use DCS\AddressBundle\Component\AddressComponentInterface;

interface AddressInterface
{
    /**
     * Get id
     *
     * @return mixed
     */
    public function getId();

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias();

    /**
     * Set alias
     *
     * @param string $alias
     * @return AddressInterface
     */
    public function setAlias($alias);

    /**
     * Get the associated AddressComponent
     *
     * @return AddressComponentInterface|null
     */
    public function getComponent();
}