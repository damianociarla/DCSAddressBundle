<?php

namespace DCS\AddressBundle\Model;

interface AddressInterface extends BaseAddressInterface, CompactAddressInterface
{
    const TYPE_BASE = 'TYPE_BASE';
    const TYPE_COMPACT = 'TYPE_COMPACT';

    /**
     * Set unique string id
     *
     * @param integer $id
     * @return AddressInterface
     */
    public function setId($id);

    /**
     * Get unique string id
     *
     * @return integer
     */
    public function getId();

    /**
     * Set country
     *
     * @param string $country
     * @return AddressInterface
     */
    public function setCountry($country = null);

    /**
     * Return country
     *
     * @return string
     */
    public function getCountry();

    /**
     * Set country code
     *
     * @param string $countryCode
     * @return AddressInterface
     */
    public function setCountryCode($countryCode = null);

    /**
     * Return country code
     *
     * @return string
     */
    public function getCountryCode();

    /**
     * Set region
     *
     * @param string $region
     * @return AddressInterface
     */
    public function setRegion($region = null);

    /**
     * Return region
     *
     * @return string
     */
    public function getRegion();

    /**
     * Set county
     *
     * @param string $county
     * @return AddressInterface
     */
    public function setCounty($county = null);

    /**
     * Return county
     *
     * @return string
     */
    public function getCounty();

    /**
     * Set county code
     *
     * @param string $countyCode
     * @return AddressInterface
     */
    public function setCountyCode($countyCode = null);

    /**
     * Return county code
     *
     * @return string
     */
    public function getCountyCode();

    /**
     * Set city
     *
     * @param string $city
     * @return AddressInterface
     */
    public function setCity($city = null);

    /**
     * Return county code
     *
     * @return string
     */
    public function getCity();

    /**
     * Set street
     *
     * @param string $street
     * @return AddressInterface
     */
    public function setStreet($street = null);

    /**
     * Return street
     *
     * @return string
     */
    public function getStreet();

    /**
     * Set street number
     *
     * @param string $streetNumber
     * @return AddressInterface
     */
    public function setStreetNumber($streetNumber = null);

    /**
     * Return street number
     *
     * @return string
     */
    public function getStreetNumber();

    /**
     * Set zip code
     *
     * @param string $zipCode
     * @return AddressInterface
     */
    public function setZipCode($zipCode = null);

    /**
     * Return zip code
     *
     * @return string
     */
    public function getZipCode();

    /**
     * Set complete address
     *
     * @param string $completeAddress
     * @return AddressInterface
     */
    public function setCompleteAddress($completeAddress = null);

    /**
     * Return complete address
     *
     * @return string
     */
    public function getCompleteAddress();

    /**
     * Set type
     *
     * @param string $type
     * @return AddressInterface
     */
    public function setType($type);

    /**
     * Return type
     *
     * @return string
     */
    public function getType();
}
