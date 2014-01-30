<?php

namespace DCS\AddressBundle;

class DCSAddressEvents
{
    /**
     * The ON_GEOCODE_SUCCESS event occurs when reverse geocoding ends
     *
     * The event listener method receives a DCS\AddressBundle\Event\GeocodeAddressEvent instance.
     */
    const ON_GEOCODE_SUCCESS = 'dcs_address.event.on_geocode_success';

    /**
     * The ON_SAVE_SUCCESS event occurs after saving address
     *
     * The event listener method receives a DCS\AddressBundle\Event\AddressEvent instance.
     */
    const ON_SAVE_SUCCESS = 'dcs_address.event.on_save_success';
}
