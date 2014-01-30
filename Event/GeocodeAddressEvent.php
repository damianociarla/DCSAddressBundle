<?php

namespace DCS\AddressBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Geocoder\Result\Geocoded;
use DCS\AddressBundle\Model\AddressInterface;

class GeocodeAddressEvent extends Event
{
    protected $geocode;
    protected $address;

    public function __construct(Geocoded $geocode, AddressInterface $address)
    {
        $this->geocode = $geocode;
        $this->address = $address;
    }

    /**
     * Get geocode result
     * 
     * @return \Geocoder\Result\Geocoded
     */
    public function getGeocode()
    {
        return $this->geocode;
    }

    /**
     * Get address
     *
     * @return \DCS\AddressBundle\Model\AddressInterface
     */
    public function getAddress()
    {
        return $this->address;
    }
}
