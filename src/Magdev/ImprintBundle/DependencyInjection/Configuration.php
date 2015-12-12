<?php

namespace Magdev\ImprintBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('magdev_imprint');
		
        $rootNode->children()
        	->arrayNode('imprint_info')->children()
        		->arrayNode('provider')
        			->children()
	        			->scalarNode('name')->cannotBeEmpty()->end()
	        			->scalarNode('street')->cannotBeEmpty()->end()
	        			->scalarNode('zipcode')->cannotBeEmpty()->end()
	        			->scalarNode('city')->cannotBeEmpty()->end()
	        			->scalarNode('country')->cannotBeEmpty()->end()
	        		->end()
	        	->end()
        		->arrayNode('contact')
        			->children()
	        			->scalarNode('phone')->cannotBeEmpty()->end()
	        			->scalarNode('fax')->end()
	        			->scalarNode('email')->cannotBeEmpty()->end()
	        			->scalarNode('url')->cannotBeEmpty()->end()
	        		->end()
	        	->end()
        		->arrayNode('responsiblePerson')
        			->children()
	        			->scalarNode('name')->cannotBeEmpty()->end()
	        			->scalarNode('company')->end()
	        			->scalarNode('note')->end()
	        			->scalarNode('street')->cannotBeEmpty()->end()
	        			->scalarNode('zipcode')->cannotBeEmpty()->end()
	        			->scalarNode('city')->cannotBeEmpty()->end()
	        			->scalarNode('country')->cannotBeEmpty()->end()
	        		->end()
	        	->end()
        		->arrayNode('legal')
        			->children()
	        			->scalarNode('register')->end()
	        			->scalarNode('registerId')->end()
	        			->scalarNode('vatId')->end()
	        			->scalarNode('ceo')->end()
	        		->end()
	        	->end()
        		->arrayNode('copyright')
        			->children()
	        			->scalarNode('year')->end()
	        			->scalarNode('holder')->end()
	        			->scalarNode('note')->end()
	        		->end()
	        	->end()
        	->end()
        ->end();
        
        return $treeBuilder;
    }
}
