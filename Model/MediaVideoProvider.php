<?php

namespace UEC\MediaVideoProviderBundle\Model;

use UEC\MediaBundle\Model\MediaProvider;

abstract class MediaVideoProvider extends MediaProvider implements MediaVideoProviderInterface
{
    /**
     * @var string
     */
    protected $provider;

    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var string
     */
    protected $authorName;

    /**
     * @var string
     */
    protected $authorUrl;

    /**
     * @var string
     */
    protected $thumbnailUrl;

    /**
     * @var string
     */
    protected $thumbnailWidth;

    /**
     * @var string
     */
    protected $thumbnailHeight;

    /**
     * @var string
     */
    protected $thumbnailPath;

    /**
     * @var string
     */
    protected $embedUrl;

    /**
     * @var string
     */
    protected $html;

    /**
     * @return array
     */
    public static function getProviders()
    {
        return array(
            self::PROVIDER_YOUTUBE,
            self::PROVIDER_VIMEO,
            self::PROVIDER_DAILY_MOTION,
        );
    }

    /**
     * @param $provider
     * @return MediaVideoProviderInterface
     * @throws \Exception
     */
    public function setProvider($provider)
    {
        if (!in_array($provider, self::getProviders())) {
            throw new \Exception(sprintf('Provider %s is not supported', $provider));
        }

        $this->provider = $provider;

        return $this;
    }

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param $width
     * @return MediaVideoProviderInterface
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param $height
     * @return MediaVideoProviderInterface
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param $authorName
     * @return MediaVideoProviderInterface
     */
    public function setAuthorName($authorName = null)
    {
        $this->authorName = $authorName;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @param $authorUrl
     * @return MediaVideoProviderInterface
     */
    public function setAuthorUrl($authorUrl = null)
    {
        $this->authorUrl = $authorUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorUrl()
    {
        return $this->authorUrl;
    }

    /**
     * @param $thumbnailUrl
     * @return MediaVideoProviderInterface
     */
    public function setThumbnailUrl($thumbnailUrl)
    {
        $this->thumbnailUrl = $thumbnailUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl()
    {
        return $this->thumbnailUrl;
    }

    /**
     * @param $thumbnailWidth
     * @return MediaVideoProviderInterface
     */
    public function setThumbnailWidth($thumbnailWidth = null)
    {
        $this->thumbnailWidth = $thumbnailWidth;

        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnailWidth()
    {
        return $this->thumbnailWidth;
    }

    /**
     * @param $thumbnailHeight
     * @return MediaVideoProviderInterface
     */
    public function setThumbnailHeight($thumbnailHeight = null)
    {
        $this->thumbnailHeight = $thumbnailHeight;

        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnailHeight()
    {
        return $this->thumbnailHeight;
    }

    /**
     * @param $thumbnailPath
     * @return MediaVideoProviderInterface
     */
    public function setThumbnailPath($thumbnailPath)
    {
        $this->thumbnailPath = $thumbnailPath;

        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnailPath()
    {
        return $this->thumbnailPath;
    }

    /**
     * @param string $embedUrl
     * @return MediaVideoProviderInterface
     */
    public function setEmbedUrl($embedUrl = null)
    {
        $this->embedUrl = $embedUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmbedUrl()
    {
        return $this->embedUrl;
    }

    /**
     * @param $html
     * @return MediaVideoProviderInterface
     */
    public function setHtml($html)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }
}