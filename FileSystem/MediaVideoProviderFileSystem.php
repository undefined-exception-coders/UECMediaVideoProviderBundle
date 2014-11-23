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

            $thumbnailUrl    = null;
            $thumbnailWidth  = null;
            $thumbnailHeight = null;
            $thumbnailPath   = null;
            $embedUrl        = null;

            if (!empty($videoInfo['thumbnail_url'])) {
                $thumbnailUrlParsed = parse_url($videoInfo['thumbnail_url']);
                $thumbnailUrl = join('', array(
                    isset($thumbnailUrlParsed['scheme']) ? $thumbnailUrlParsed['scheme'].'://' : 'http://',
                    $thumbnailUrlParsed['host'],
                    $thumbnailUrlParsed['path']
                ));

                $thumbnailWidth = $videoInfo['thumbnail_width'];
                $thumbnailHeight = $videoInfo['thumbnail_height'];

                $thumbnailPath = $this->pathGenerator->generate($mediaProvider).DIRECTORY_SEPARATOR.md5(uniqid()).'.'.pathinfo($thumbnailUrl, PATHINFO_EXTENSION);

                $thumb = file_get_contents($videoInfo['thumbnail_url']);
                file_put_contents($thumbnailPath, $thumb);
            }

            if (preg_match('/<iframe.*src=\"(.*)\".*>.*<\/iframe>/isU', $videoInfo['html'], $matches)) {
                $embedUrl = $matches[1];
            }

            $videoProviderInfo = new VideoProviderInfo();
            $videoProviderInfo->setProvider($mediaProvider->getProvider());
            $videoProviderInfo->setVideoTitle($videoInfo['title']);
            $videoProviderInfo->setWidth($videoInfo['width']);
            $videoProviderInfo->setHeight($videoInfo['height']);
            $videoProviderInfo->setAuthorName(!empty($videoInfo['author_name']) ? $videoInfo['author_name'] : null);
            $videoProviderInfo->setAuthorUrl(!empty($videoInfo['author_url']) ? $videoInfo['author_url'] : null);
            $videoProviderInfo->setThumbnailUrl($thumbnailUrl);
            $videoProviderInfo->setThumbnailWidth($thumbnailWidth);
            $videoProviderInfo->setThumbnailHeight($thumbnailHeight);
            $videoProviderInfo->setThumbnailPath($thumbnailPath);
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