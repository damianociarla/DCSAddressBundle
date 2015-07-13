<?php

namespace DCS\AddressBundle\EventListener;

use DCS\AddressBundle\Model\AddressComponentInjectorInterface;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DoctrineEventListener
{
    private $container;

    public function __construct(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $object = $args->getObject();

        if ($object instanceof AddressComponentInjectorInterface) {
            $component = $this->container->get('dcs_address.resolver')->resolve($object);
            $object->setComponent($component);
        }
    }
} 