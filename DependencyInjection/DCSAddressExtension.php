<?php

namespace DCS\AddressBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class DCSAddressExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        if (!in_array(strtolower($config['db_driver']), array('orm'))) {
            throw new \InvalidArgumentException(sprintf('Invalid db driver "%s".', $config['db_driver']));
        }

        $loader->load(sprintf('%s.xml', $config['db_driver']));

        $container->setParameter('dcs_address.driver', $config['db_driver']);
        $container->setParameter('dcs_address.model.address.class', $config['model']['address']);

        $container->setAlias('dcs_address.manager.address', $config['address_manager']);

        foreach ($config['form'] as $formName => $formInfo) {
            foreach ($formInfo as $key => $val) {
                $container->setParameter('dcs_address.form.'.$formName.'.'.$key, $val);
            }
        }

        $loader->load('form.xml');
    }
}
