<?php

namespace DCS\AddressBundle\Form\Type;

use DCS\AddressBundle\Component\ComponentChainInterface;
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

        $builder->addEventListener(FormEvents::POST_SET_DATA, function (FormEvent $event) use ($componentChain) {
            $address = $event->getData();

            if (!$address instanceof AddressInterface) {
                return;
            }

            $form = $event->getForm();
            $formName = $componentChain->getFormName($address->getAlias());

            $form->add('component', $formName);
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->addressManager->getModelClass(),
        ));
    }

    public function getName()
    {
        return 'dcs_address';
    }
}