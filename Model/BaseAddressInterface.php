<?php

namespace DCS\AddressBundle\Model;

use DCS\Form\SelectCityFormFieldBundle\Model\CountryInterface;
use DCS\Form\SelectCityFormFieldBundle\Model\RegionInterface;
use DCS\Form\SelectCityFormFieldBundle\Model\CityInterface;

interface BaseAddressInterface
{
    /**
     * Set country reference on the external table
     *
     * @param \DCS\Form\SelectCityFormFieldBundle\Model\CountryInterface $country
     * @return BaseAddressInterface
     */
    public function setCountryReference(CountryInterface $country = null);

    /**
     * @return \DCS\Form\SelectCityFormFieldBundle\Model\CountryInterface
     */
    public function getCountryReference();

    /**
     * Set region reference on the external table
     *
     * @param \DCS\Form\SelectCityFormFieldBundle\Model\RegionInterface $region
     * @return BaseAddressInterface
     */
    public function setRegionReference(RegionInterface $region = null);

    /**
     * @return \DCS\Form\SelectCityFormFieldBundle\Model\RegionInterface
     */
    public function getRegionReference();

    /**
     * Set city reference on the external table
     *
     * @param \DCS\Form\SelectCityFormFieldBundle\Model\CityInterface $city
     * @return BaseAddressInterface
     */
    public function setCityReference(CityInterface $city = null);

    /**
     * @return \DCS\Form\SelectCityFormFieldBundle\Model\CityInterface
     */
    public function getCityReference();
}
