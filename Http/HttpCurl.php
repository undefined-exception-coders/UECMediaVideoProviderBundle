<?php

namespace UEC\MediaVideoProviderBundle\Http;

class HttpCurl extends AbstractHttp
{
    /**
     * {@inheritdoc}
     */
    public function getInfoUrl($provider, $urlToParse)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->getUrl($provider, $urlToParse));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);

        curl_close($ch);

        return json_decode($output, true);
    }
} 