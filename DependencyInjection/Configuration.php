<?php

namespace UEC\MediaVideoProviderBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('uec_media_video_provider');

        $rootNode
            ->children()
                ->scalarNode('model')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('cdn')
                    ->defaultvalue('uec_media_video_provider.cdn.default')
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('file_system')
                    ->defaultvalue('uec_media_video_provider.file_system.default')
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('form_name')
                    ->defaultvalue('uec_media_video_provider_form')
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('form_processor')
                    ->defaultvalue('uec_media_video_provider.form.processor.default')
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('model_manager')
                    ->defaultvalue('uec_media_video_provider.manager.media_video_provider.default')
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('http_client')
                    ->defaultvalue('uec_media_video_provider.http.curl')
                    ->cannotBeEmpty()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
