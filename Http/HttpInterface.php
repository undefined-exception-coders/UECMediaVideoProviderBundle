<?php

namespace UEC\MediaVideoProviderBundle\Http;

interface HttpInterface
{
    /**
     * Return the response of the provider
     *
     * @param string $provider
     * @param string $urlToParse
     * @return mixed|null
     */
    public function getInfoUrl($provider, $urlToParse);
} 