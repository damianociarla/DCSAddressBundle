<?php

namespace DCS\AddressBundle\Resolver;

use DCS\AddressBundle\Component\ComponentChainInterface;
use DCS\AddressBundle\Model\AddressInterface;

class Resolver implements ResolverInterface
{
    private $componentChain;

    public function __construct(ComponentChainInterface $componentChain)
    {
        $this->componentChain = $componentChain;
    }

    public function resolve(AddressInterface $address)
    {
        return $this->componentChain->getComponentManager($address->getAlias())->findOneByAddress($address);
    }
}