<?php

namespace UEC\MediaVideoProviderBundle\Http;

use UEC\MediaVideoProviderBundle\Model\MediaVideoProviderInterface;

abstract class AbstractHttp implements HttpInterface
{
    private $providers = array(
        MediaVideoProviderInterface::PROVIDER_YOUTUBE => 'http://www.youtube.com/oembed?url=%s&format=json',
        MediaVideoProviderInterface::PROVIDER_VIMEO => 'http://vimeo.com/api/oembed.json?url=%s',
        MediaVideoProviderInterface::PROVIDER_DAILY_MOTION => 'http://www.dailymotion.com/services/oembed?format=json&url=%s',
    );

    /**
     * Get url to call
     *
     * @param string $provider
     * @param string $urlToParse
     * @return string
     */
    protected function getUrl($provider, $urlToParse)
    {
        return sprintf($this->providers[$provider], urlencode($urlToParse));
    }
} 