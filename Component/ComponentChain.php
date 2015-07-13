<?php

namespace DCS\AddressBundle\Component;

use DCS\AddressBundle\Exception\ComponentNotFoundException;

class ComponentChain implements ComponentChainInterface
{
    private $components;

    function __construct()
    {
        $this->components = array();
    }

    public function addComponent($name, ComponentManagerInterface $componentManager, $formName)
    {
        $this->components[$name] = array(
            'cm' => $componentManager,
            'form' => $formName,
        );
    }

    public function getComponentManager($name)
    {
        if (!isset($this->components[$name])) {
            throw new ComponentNotFoundException();
        }

        return $this->components[$name]['cm'];
    }

    public function getFormName($name)
    {
        if (!isset($this->components[$name])) {
            throw new ComponentNotFoundException();
        }

        return $this->components[$name]['form'];
    }
}