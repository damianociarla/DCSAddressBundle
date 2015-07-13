<?php

namespace DCS\AddressBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dcs_address');

        $rootNode
            ->children()
                ->enumNode('db_driver')
                    ->values(array('orm',''))
                    ->isRequired()
                ->end()
                ->scalarNode('model_class')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('form_name')
                    ->defaultValue('dcs_address')
                    ->cannotBeEmpty()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
