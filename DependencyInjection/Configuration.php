<?php

namespace DCS\AddressBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dcs_address');

        $rootNode
            ->children()
                ->scalarNode('db_driver')->isRequired()->end()
                ->scalarNode('address_manager')->defaultValue('dcs_address.manager.address.default')->end()
            ->end()
        ;

        $this->addModelConfiguration($rootNode);
        $this->addFormSection($rootNode);

        return $treeBuilder;
    }

    private function addModelConfiguration(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('model')
                    ->children()
                        ->scalarNode('address')
                            ->isRequired()
                            ->cannotBeEmpty()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    private function addFormSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('form')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                    ->children()
                        ->arrayNode('base')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('type')->defaultValue('dcs_address_base')->end()
                                ->scalarNode('name')->defaultValue('dcs_address_base_form')->end()
                            ->end()
                        ->end()
                        ->arrayNode('compact')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('type')->defaultValue('dcs_address_compact')->end()
                                ->scalarNode('name')->defaultValue('dcs_address_compact_form')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }
}
