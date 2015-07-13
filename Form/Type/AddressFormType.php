<?php

namespace DCS\AddressBundle\Form\Type;

use DCS\AddressBundle\Component\ComponentChainInterface;
use DCS\AddressBundle\Exception\MissingAliasException;
use DCS\AddressBundle\Model\AddressInterface;
use DCS\AddressBundle\Model\AddressManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressFormType extends AbstractType
{
    private $addressManager;
    private $componentChain;

    function __construct(AddressManagerInterface $addressManager, ComponentChainInterface $componentChain)
    {
        $this->addressManager = $addressManager;
        $this->componentChain = $componentChain;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $componentChain = $this->componentChain;
        $alias = $options['alias'];

        $builder->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) use ($componentChain, $alias) {
            $address = $event->getData();

            if ($address instanceof AddressInterface) {
                if (null !== $address->getAlias()) {
                    $alias = $address->getAlias();
                } else {
                    if (empty($alias)) {
                        throw new MissingAliasException();
                    }
                }
            }

            if (empty($alias)) {
                throw new MissingAliasException();
            }

            $form = $event->getForm();
            $form->add('component', $componentChain->getFormName($alias));
        });

        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) use ($alias) {
            $address = $event->getData();

            if ($address instanceof AddressInterface) {
                if (null === $address->getAlias()) {
                    if (empty($alias)) {
                        throw new MissingAliasException();
                    }
                    $address->setAlias($alias);
                }
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->addressManager->getModelClass(),
            'alias' => null,
        ));
        $resolver->setDefined(array(
            'alias'
        ));
    }

    public function getName()
    {
        return 'dcs_address';
    }
}