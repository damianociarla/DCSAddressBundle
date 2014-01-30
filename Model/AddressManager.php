<?php

namespace DCS\AddressBundle\Model;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Doctrine\ORM\EntityManager;
use Bazinga\Bundle\GeocoderBundle\Geocoder\LoggableGeocoder;
use CrEOF\Spatial\PHP\Types\Geometry\Point;
use DCS\AddressBundle\DCSAddressEvents;
use DCS\AddressBundle\Event;

abstract class AddressManager implements AddressManagerInterface
{
    /**
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var \Bazinga\Bundle\GeocoderBundle\Geocoder\LoggableGeocoder
     */
    protected $geocoder;

    public function __construct(EventDispatcherInterface $dispatcher, EntityManager $em, LoggableGeocoder $geocoder)
    {
        $this->dispatcher = $dispatcher;
        $this->em = $em;;
        $this->geocoder = $geocoder;
    }

    /**
     * Reverse geocoding from Point
     *
     * @param \CrEOF\Spatial\PHP\Types\Geometry\Point $point
     * @return \Geocoder\Result\Geocoded
     */
    protected function geocode(Point $point)
    {
        return $this->geocoder->reverse($point->getLatitude(), $point->getLongitude());
    }

    /**
     * {@inheritdoc}
     */
    public function saveAddress(AddressInterface $address)
    {
        switch ($address->getType()) {
            case AddressInterface::TYPE_BASE:
                $address->setCompleteAddress(sprintf('%s, %s, %s',
                    $address->getStreet(),
                    $address->getStreetNumber(),
                    $address->getCity()
                ));
                // Empty point
                $address->setPoint(null);
                break;

            case AddressInterface::TYPE_COMPACT:
                $geocode = $this->geocode($address->getPoint());
                // Fill data
                $address->setCountry($geocode->getCountry());
                $address->setCountryCode($geocode->getCountryCode());
                $address->setRegion($geocode->getRegion());
                $address->setCounty($geocode->getCounty());
                $address->setCountyCode($geocode->getCountyCode());
                $address->setCity($geocode->getCity());
                $address->setStreet($geocode->getStreetName());
                $address->setStreetNumber($geocode->getStreetNumber());
                $address->setZipCode($geocode->getZipcode());
                // Empty select reference
                $address->setCountryReference(null);
                $address->setRegionReference(null);
                $address->setCityReference(null);
                // Dispatch event after geocoded result
                $this->dispatcher->dispatch(DCSAddressEvents::ON_GEOCODE_SUCCESS, new Event\GeocodeAddressEvent($geocode, $address));
                break;
        }

        $this->doSaveAddress($address);
        // Dispatch event after save address
        $this->dispatcher->dispatch(DCSAddressEvents::ON_SAVE_SUCCESS, new Event\AddressEvent($address));
    }

    /**
     * Performs the persistence of the Address.
     *
     * @abstract
     * @param AddressInterface $address
     */
    abstract protected function doSaveAddress(AddressInterface $address);
}
