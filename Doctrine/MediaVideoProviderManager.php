<?php

namespace UEC\MediaVideoProviderBundle\Doctrine;

use Doctrine\ORM\EntityManager;
use UEC\MediaBundle\Model\MediaProviderInterface;
use UEC\MediaBundle\Model\MediaProviderManager;
use UEC\MediaVideoProviderBundle\FileSystem\VideoInfo;
use UEC\MediaVideoProviderBundle\FileSystem\VideoProviderInfo;
use UEC\MediaVideoProviderBundle\Model\MediaVideoProviderInterface;

class MediaVideoProviderManager extends MediaProviderManager
{
    protected $em;
    protected $className;

    function __construct(EntityManager $em, $className)
    {
        $this->em = $em;
        $this->className = $className;
    }

    /**
     * {@inheritdoc}
     */
    public function getClass()
    {
        return $this->className;
    }

    /**
     * {@inheritdoc}
     */
    public function fillMediaProviderData(MediaProviderInterface &$mediaProvider, $data)
    {
        if ($data instanceof VideoProviderInfo
            && $mediaProvider instanceof MediaVideoProviderInterface
        ) {
            $mediaProvider->getMedia()->setName($data->getVideoTitle());
            $mediaProvider->setProvider($data->getProvider());
            $mediaProvider->setWidth($data->getWidth());
            $mediaProvider->setHeight($data->getHeight());
            $mediaProvider->setAuthorName($data->getAuthorName());
            $mediaProvider->setAuthorUrl($data->getAuthorUrl());
            $mediaProvider->setThumbnailUrl($data->getThumbnailUrl());
            $mediaProvider->setThumbnailWidth($data->getThumbnailWidth());
            $mediaProvider->setThumbnailHeight($data->getThumbnailHeight());
            $mediaProvider->setThumbnailPath($data->getThumbnailPath());
            $mediaProvider->setEmbedUrl($data->getEmbedUrl());
            $mediaProvider->setHtml($data->getHtml());
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function doSaveMediaProvider(MediaProviderInterface $mediaProvider)
    {
        $this->em->persist($mediaProvider);
        $this->em->flush();
    }

    /**
     * {@inheritdoc}
     */
    protected function findOneBy(array $criteria)
    {
        return $this->em->getRepository($this->className)->findOneBy($criteria);
    }
}