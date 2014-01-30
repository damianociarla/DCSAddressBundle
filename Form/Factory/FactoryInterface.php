<?php

namespace DCS\AddressBundle\Form\Factory;

interface FactoryInterface
{
    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createForm();
}
