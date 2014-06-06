<?php

namespace UEC\MediaVideoProviderBundle\FileSystem;

class VideoProviderInfo
{
    /**
     * @var string
     */
    protected $provider;

    /**
     * @var string
     */
    protected $videoTitle;

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
     * @param $provider
     * @return VideoProviderInfo
     */
    public function setProvider($provider)
    {
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
     * @param string $videoTitle
     */
    public function setVideoTitle($videoTitle)
    {
        $this->videoTitle = $videoTitle;
    }

    /**
     * @return string
     */
    public function getVideoTitle()
    {
        return $this->videoTitle;
    }

    /**
     * @param $width
     * @return VideoProviderInfo
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
     * @return VideoProviderInfo
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
     * @return VideoProviderInfo
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
     * @return VideoProviderInfo
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
     * @return VideoProviderInfo
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
     * @return VideoProviderInfo
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
     * @return VideoProviderInfo
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
     * @return VideoProviderInfo
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
     * @return VideoProviderInfo
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
     * @return VideoProviderInfo
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