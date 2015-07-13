<?php

namespace DCS\AddressBundle\Component;

use DCS\AddressBundle\Exception\ComponentNotFoundException;

interface ComponentChainInterface
{
    public function addComponent($name, ComponentManagerInterface $componentManager, $formName);

    /**
     * Get the ComponentManagerInterface
     *
     * @param string $name
     * @return ComponentManagerInterface
     * @throws ComponentNotFoundException
     */
    public function getComponentManager($name);

    /**
     * Get the form name
     *
     * @param string $name
     * @return string
     * @throws ComponentNotFoundException
     */
    public function getFormName($name);
}