<?php

namespace UEC\MediaVideoProviderBundle\Model;

interface MediaVideoProviderInterface
{
    /**
     * @param $provider
     * @return MediaVideoProviderInterface
     */
    public function setProvider($provider);

    /**
     * @return string
     */
    public function getProvider();

    /**
     * @param $width
     * @return MediaVideoProviderInterface
     */
    public function setWidth($width);

    /**
     * @return int
     */
    public function getWidth();

    /**
     * @param $height
     * @return MediaVideoProviderInterface
     */
    public function setHeight($height);

    /**
     * @return int
     */
    public function getHeight();

    /**
     * @param $authorName
     * @return MediaVideoProviderInterface
     */
    public function setAuthorName($authorName = null);

    /**
     * @return string
     */
    public function getAuthorName();

    /**
     * @param $authorUrl
     * @return MediaVideoProviderInterface
     */
    public function setAuthorUrl($authorUrl = null);

    /**
     * @return string
     */
    public function getAuthorUrl();

    /**
     * @param $thumbnailUrl
     * @return MediaVideoProviderInterface
     */
    public function setThumbnailUrl($thumbnailUrl);

    /**
     * @return string
     */
    public function getThumbnailUrl();

    /**
     * @param $thumbnailWidth
     * @return MediaVideoProviderInterface
     */
    public function setThumbnailWidth($thumbnailWidth = null);

    /**
     * @return string
     */
    public function getThumbnailWidth();

    /**
     * @param $thumbnailHeight
     * @return MediaVideoProviderInterface
     */
    public function setThumbnailHeight($thumbnailHeight = null);

    /**
     * @return string
     */
    public function getThumbnailHeight();

    /**
     * @param $thumbnailPath
     * @return MediaVideoProviderInterface
     */
    public function setThumbnailPath($thumbnailPath);

    /**
     * @return string
     */
    public function getThumbnailPath();

    /**
     * @param string $embedUrl
     * @return MediaVideoProviderInterface
     */
    public function setEmbedUrl($embedUrl = null);

    /**
     * @return string
     */
    public function getEmbedUrl();

    /**
     * @param $html
     * @return MediaVideoProviderInterface
     */
    public function setHtml($html);

    /**
     * @return string
     */
    public function getHtml();
} 