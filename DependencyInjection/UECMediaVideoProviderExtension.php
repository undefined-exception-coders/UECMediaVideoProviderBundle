<?php

namespace UEC\MediaVideoProviderBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class UECMediaVideoProviderExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load(sprintf('%s.xml', $container->getParameter('uec_media.db_driver')));

        $providers = array(
            Configuration::PROVIDER_YOUTUBE => $config['providers'][Configuration::PROVIDER_YOUTUBE],
            Configuration::PROVIDER_VIMEO => $config['providers'][Configuration::PROVIDER_VIMEO],
            Configuration::PROVIDER_DAILY_MOTION => $config['providers'][Configuration::PROVIDER_DAILY_MOTION],
        );

        if (isset($config['providers']['custom']) && is_array($config['providers']['custom'])) {
            foreach ($config['providers']['custom'] as $providerName => $providerUrl) {
                $providers[$providerName] = $providerUrl;
            }
        }

        $container->setParameter('uec_media_video_provider.providers', $providers);
        $container->setParameter('uec_media_video_provider.model.class', $config['model']);
        $container->setParameter('uec_media_video_provider.form_name', $config['form_name']);

        $container->setAlias('uec_media_video_provider.cdn', $config['cdn']);
        $container->setAlias('uec_media_video_provider.file_system', $config['file_system']);
        $container->setAlias('uec_media_video_provider.form_processor', $config['form_processor']);
        $container->setAlias('uec_media_video_provider.model_manager', $config['model_manager']);
        $container->setAlias('uec_media_video_provider.http', $config['http_client']);

        $loader->load('cdn.xml');
        $loader->load('file_system.xml');
        $loader->load('form.xml');
        $loader->load('http.xml');
        $loader->load('provider.xml');
        $loader->load('validator.xml');
    }
}
