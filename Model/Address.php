<?php

namespace DCS\AddressBundle\Model;

use DCS\AddressBundle\Component\AddressComponentInterface;

abstract class Address implements AddressInterface, AddressComponentInjectorInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @var AddressComponentInterface
     */
    protected $component;

    public function __construct($alias = null)
    {
        $this->alias = $alias;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function setAlias($alias)
    {
        $this->alias = $alias;
        return $this;
    }

    public function getComponent()
    {
        return $this->component;
    }

    public function setComponent(AddressComponentInterface $component)
    {
        $component->setAddress($this);
        $this->component = $component;
    }
}