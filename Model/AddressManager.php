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
    public function save(AddressInterface $address, $andFlush = true)
    {
        $this->persist($address, $andFlush);

        $component = $address->getComponent();
        $component->setAddress($address);

        $componentManager = $this->componentChain->getComponentManager($address->getAlias());
        $componentManager->save($address->getComponent(), $andFlush);
    }

    /**
     * Save the address instance
     *
     * @param AddressInterface $address
     * @param boolean $andFlush
     */
    protected abstract function persist(AddressInterface $address, $andFlush = true);
}