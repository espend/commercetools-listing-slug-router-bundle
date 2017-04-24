<?php

namespace BestIt\CtListingSlugRouterBundle\DependencyInjection;

use BestIt\CtListingSlugRouter\Router\ListingRouter;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration class for this bundle.
 * @author chowanski <chowanski@bestit-online.de>
 * @package BestIt\CtListingSlugRouterBundle
 * @subpackage DependencyInjection
 * @version $id$
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Parses the config.
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();

        $builder->root('best_it_ct_listing_slug_router')
            ->children()
                ->scalarNode('controller')
                    ->info('Which controller-method should be used on a positive match?')
                    ->defaultValue(ListingRouter::DEFAULT_CONTROLLER)
                    ->cannotBeEmpty()
                ->end()
                ->integerNode('priority')
                    ->info('Which priority has this router in the cmf chaining?')
                    ->defaultValue(0)
                ->end()
                ->scalarNode('repository')
                    ->info(
                        'Service id for the repository loading categories with their slug. You should fulfill ' .
                        'the provided interface.'
                    )
                    ->cannotBeEmpty()
                    ->isRequired()
                ->end()
                ->scalarNode('route')
                    ->info('Which route name is used for a positive match?')
                    ->defaultValue(ListingRouter::DEFAULT_ROUTE)
                    ->cannotBeEmpty()
                ->end()
            ->end();

        return $builder;
    }
}
