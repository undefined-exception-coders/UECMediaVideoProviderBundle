<?php

namespace UEC\MediaVideoProviderBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    const PROVIDER_YOUTUBE = 'youtube';
    const PROVIDER_VIMEO = 'vimeo';
    const PROVIDER_DAILY_MOTION = 'daily_motion';

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
                ->arrayNode('providers')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode(self::PROVIDER_YOUTUBE)
                            ->defaultValue('http://www.youtube.com/oembed?url=%s&format=json')
                            ->cannotBeEmpty()
                        ->end()
                        ->scalarNode(self::PROVIDER_VIMEO)
                            ->defaultValue('http://vimeo.com/api/oembed.json?url=%s')
                            ->cannotBeEmpty()
                        ->end()
                        ->scalarNode(self::PROVIDER_DAILY_MOTION)
                            ->defaultValue('http://www.dailymotion.com/services/oembed?format=json&url=%s')
                            ->cannotBeEmpty()
                        ->end()
                        ->variableNode('custom')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
