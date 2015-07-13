<?php

namespace DCS\AddressBundle\Model;

use DCS\AddressBundle\Component\ComponentChainInterface;

abstract class AddressManager implements AddressManagerInterface
{
    private $componentChain;

    public function __construct(ComponentChainInterface $componentChain)
    {
        $this->componentChain = $componentChain;
    }

    /**
     * @inheritDoc
     */
    public function create($alias)
    {
        $componentManager = $this->componentChain->getComponentManager($alias);
        $component = $componentManager->create();

        $modelClass = $this->getModelClass();

        $address = new $modelClass($alias);
        $address->setComponent($component);

        return $address;
    }

    /**
     * @inheritDoc
     */
    public function save(AddressInterface $address)
    {
        $this->persist($address);

        $componentManager = $this->componentChain->getComponentManager($address->getAlias());
        $componentManager->save($address->getComponent());
    }

    /**
     * Save the address instance
     *
     * @param AddressInterface $address
     */
    protected abstract function persist(AddressInterface $address);
}