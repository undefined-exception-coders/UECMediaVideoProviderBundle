<?php

namespace UEC\MediaVideoProviderBundle\FileSystem;

use UEC\MediaBundle\FileSystem\FileInfoInterface;

class FileInfo implements FileInfoInterface
{
    protected $tmpName;

    function __construct($file = null)
    {
        if (!empty($file)) {
            $this->tmpName = $file;
        }
    }

    /**
     * @return string
     */
    public function getTmpName()
    {
        return $this->tmpName;
    }

    /**
     * @return null|string
     */
    public function getName()
    {
        return '';
    }

    /**
     * @return null
     */
    public function getSize()
    {
        return null;
    }

    /**
     * @return null
     */
    public function getType()
    {
        return null;
    }

    /**
     * @return null
     */
    public function getError()
    {
        return null;
    }

    /**
     * This method must return true if the file is coming from $_FILES, or false instead.
     *
     * @return bool
     */
    public function isUploadedFile()
    {
        return false;
    }

} 