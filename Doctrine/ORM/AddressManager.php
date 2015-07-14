<?php

namespace DCS\AddressBundle\Doctrine\ORM;

use DCS\AddressBundle\Component\ComponentChainInterface;
use DCS\AddressBundle\Model\AddressInterface;
use DCS\AddressBundle\Model\AddressManager as BaseAddressManager;
use Doctrine\ORM\EntityManagerInterface;

class AddressManager extends BaseAddressManager
{
    private $className;
    private $entityManager;

    function __construct($className, EntityManagerInterface $entityManager, ComponentChainInterface $componentChain)
    {
        parent::__construct($componentChain);

        $this->className = $className;
        $this->entityManager = $entityManager;
    }

    /**
     * @inheritdoc
     */
    public function getModelClass()
    {
        return $this->className;
    }

    /**
     * @inheritdoc
     */
    public function persist(AddressInterface $address, $andFlush = true)
    {
        $this->entityManager->persist($address);

        if ($andFlush) {
            $this->entityManager->flush();
        }
    }

    /**
     * @inheritdoc
     */
    public function findOneById($id)
    {
        return $this->entityManager->find($this->className, $id);
    }
}