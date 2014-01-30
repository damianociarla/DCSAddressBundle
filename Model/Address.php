<?php

namespace DCS\AddressBundle\Model;

use DCS\Form\SelectCityFormFieldBundle\Model\CountryInterface;
use DCS\Form\SelectCityFormFieldBundle\Model\RegionInterface;
use DCS\Form\SelectCityFormFieldBundle\Model\CityInterface;
use CrEOF\Spatial\PHP\Types\Geometry\Point;

abstract class Address implements AddressInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @var \DCS\Form\SelectCityFormFieldBundle\Model\CountryInterface
     */
    protected $countryReference;

    /**
     * @var string
     */
    protected $region;

    /**
     * @var \DCS\Form\SelectCityFormFieldBundle\Model\RegionInterface
     */
    protected $regionReference;

    /**
     * @var string
     */
    protected $county;

    /**
     * @var string
     */
    protected $countyCode;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var \DCS\Form\SelectCityFormFieldBundle\Model\CityInterface
     */
    protected $cityReference;

    /**
     * @var string
     */
    protected $street;

    /**
     * @var string
     */
    protected $streetNumber;

    /**
     * @var string
     */
    protected $zipCode;

    /**
     * @var \CrEOF\Spatial\PHP\Types\Geometry\Point
     */
    protected $point;

    /**
     * @var string
     */
    protected $completeAddress;

    /**
     * @var \DCS\Form\SelectCityFormFieldBundle\Model\SelectData
     */
    protected $selectData;

    /**
     * @var string
     */
    protected $type;

    /**
     * {@inheritdoc}
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountry($country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountryCode($countryCode = null)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountryReference(CountryInterface $countryReference = null)
    {
        $this->countryReference = $countryReference;

        if (null !== $countryReference) {
            $this->countryCode = $countryReference->getCountryCode();
            $this->country = $countryReference->getCountryName();
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryReference()
    {
        return $this->countryReference;
    }

    /**
     * {@inheritdoc}
     */
    public function setRegion($region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * {@inheritdoc}
     */
    public function setRegionReference(RegionInterface $regionReference = null)
    {
        $this->regionReference = $regionReference;

        if (null !== $regionReference) {
            $this->region = $regionReference->getRegionName();
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRegionReference()
    {
        return $this->regionReference;
    }

    /**
     * {@inheritdoc}
     */
    public function setCounty($county = null)
    {
        $this->county = $county;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * {@inheritdoc}
     */
    public function setCountyCode($countyCode = null)
    {
        $this->countyCode = $countyCode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCountyCode()
    {
        return $this->countyCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setCity($city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * {@inheritdoc}
     */
    public function setCityReference(CityInterface $cityReference = null)
    {
        $this->cityReference = $cityReference;

        if (null !== $cityReference) {
            $this->city = $cityReference->getCityName();
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCityReference()
    {
        return $this->cityReference;
    }

    /**
     * {@inheritdoc}
     */
    public function setStreet($street = null)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * {@inheritdoc}
     */
    public function setStreetNumber($streetNumber = null)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * {@inheritdoc}
     */
    public function setZipCode($zipCode = null)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setPoint(Point $point = null)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * {@inheritdoc}
     */
    public function setCompleteAddress($completeAddress = null)
    {
        $this->completeAddress = $completeAddress;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCompleteAddress()
    {
        return $this->completeAddress;
    }

    /**
     * {@inheritdoc}
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set selectData
     *
     * @param \DCS\Form\SelectCityFormFieldBundle\Model\SelectData $selectData
     * @return Address
     */
    public function setSelectData(\DCS\Form\SelectCityFormFieldBundle\Model\SelectData $selectData)
    {
        $this->setCountryReference($selectData->getCountry());
        $this->setRegionReference($selectData->getRegion());
        $this->setCityReference($selectData->getCity());

        $this->selectData = $selectData;

        return $this;
    }

    /**
     * Get selectData
     *
     * @return \DCS\Form\SelectCityFormFieldBundle\Model\SelectData
     */
    public function getSelectData()
    {
        $selectData = new \DCS\Form\SelectCityFormFieldBundle\Model\SelectData();
        $selectData->setCountry($this->getCountryReference());
        $selectData->setRegion($this->getRegionReference());
        $selectData->setCity($this->getCityReference());

        return $selectData;
    }
}
