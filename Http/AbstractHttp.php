<?php

namespace UEC\MediaVideoProviderBundle\Http;

abstract class AbstractHttp implements HttpInterface
{
    private $providers;

    function __construct(array $providers)
    {
        $this->providers = $providers;
    }

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