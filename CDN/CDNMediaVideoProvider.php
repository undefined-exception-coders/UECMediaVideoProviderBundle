<?php

namespace UEC\MediaVideoProviderBundle\CDN;

use UEC\MediaBundle\CDN\AbstractCDN;

class CDNMediaVideoProvider extends AbstractCDN
{
    /**
     * {@inheritdoc}
     */
    public function getThumbPath()
    {
        return $this->mediaProvider->getThumbnailPath();
    }

    /**
     * {@inheritdoc}
     */
    public function getFilePath()
    {
        return $this->mediaProvider->getMedia()->getPath();
    }

    /**
     * {@inheritdoc}
     */
    public function getContent(array $options = array())
    {
        return $this->mediaProvider->getHtml();
    }
}