<?php

namespace DCS\AddressBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class DCSAddressExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('dcs_address.model_class', $config['model_class']);
        $container->setParameter('dcs_address.form_name', $config['form_name']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load(sprintf('%s.xml', $config['db_driver']));

        $container->setAlias('dcs_address.manager.address', 'dcs_address.manager.address.default');

        $loader->load('component.xml');
        $loader->load('form.xml');
        $loader->load('listener.xml');
        $loader->load('resolver.xml');
        $loader->load('twig.xml');
    }
}
