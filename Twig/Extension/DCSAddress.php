<?php

namespace DCS\AddressBundle\Twig\Extension;

use DCS\AddressBundle\DCSAddressEvents;
use DCS\AddressBundle\Event\FormattedAddressEvent;
use DCS\AddressBundle\Model\AddressInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class DCSAddress extends \Twig_Extension
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('formatted_address', array($this, 'getFormattedAddressFilter')),
        );
    }

    public function getFormattedAddressFilter(AddressInterface $address)
    {
        $event = new FormattedAddressEvent($address);
        $this->dispatcher->dispatch(DCSAddressEvents::TWIG_FORMATTED_ADDRESS, $event);

        return $event->getFormattedAddress();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'dcs_address';
    }
}