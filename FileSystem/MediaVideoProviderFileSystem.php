<?php

namespace UEC\MediaVideoProviderBundle\FileSystem;

use UEC\MediaBundle\FileSystem\FileInfoInterface;
use UEC\MediaBundle\FileSystem\FileSystemInterface;
use UEC\MediaBundle\Model\MediaProviderInterface;
use UEC\MediaBundle\Path\PathGeneratorInterface;
use UEC\MediaVideoProviderBundle\Http\HttpInterface;

class MediaVideoProviderFileSystem implements FileSystemInterface
{
    /**
     * @var \UEC\MediaVideoProviderBundle\Http\HttpInterface
     */
    protected $http;

    /**
     * @var \UEC\MediaBundle\Path\PathGeneratorInterface
     */
    protected $pathGenerator;

    function __construct(HttpInterface $http, PathGeneratorInterface $pathGenerator)
    {
        $this->http = $http;
        $this->pathGenerator = $pathGenerator;
    }

    /**
     * {@inheritdoc}
     */
    public function upload(FileInfoInterface $fileInfo, MediaProviderInterface $mediaProvider, $filePath)
    {
        if (null !== $videoInfo = $this->http->getInfoUrl($mediaProvider->getProvider(), $fileInfo->getTmpName())) {
            $thumbPath = $this->pathGenerator->generate($mediaProvider).DIRECTORY_SEPARATOR.
                         md5(uniqid()).'.'.pathinfo($videoInfo['thumbnail_url'], PATHINFO_EXTENSION);

            $thumb = file_get_contents($videoInfo['thumbnail_url']);
            file_put_contents($thumbPath, $thumb);

            $embedUrl = null;

            if (preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $videoInfo['html'], $matches)) {
                $embedUrl = $matches[1];
            }

            $videoProviderInfo = new VideoProviderInfo();
            $videoProviderInfo->setProvider($mediaProvider->getProvider());
            $videoProviderInfo->setVideoTitle($videoInfo['title']);
            $videoProviderInfo->setWidth($videoInfo['width']);
            $videoProviderInfo->setHeight($videoInfo['height']);
            $videoProviderInfo->setAuthorName($videoInfo['author_name']);
            $videoProviderInfo->setAuthorUrl($videoInfo['author_url']);
            $videoProviderInfo->setThumbnailUrl($videoInfo['thumbnail_url']);
            $videoProviderInfo->setThumbnailWidth($videoInfo['thumbnail_width']);
            $videoProviderInfo->setThumbnailHeight($videoInfo['thumbnail_height']);
            $videoProviderInfo->setThumbnailPath($thumbPath);
            $videoProviderInfo->setEmbedUrl($embedUrl);
            $videoProviderInfo->setHtml($videoInfo['html']);

            return $videoProviderInfo;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilePath(FileInfoInterface $fileInfo, MediaProviderInterface $mediaProvider, PathGeneratorInterface $pathGenerator)
    {
        return $fileInfo->getTmpName();
    }
} 