<?php

namespace UEC\MediaVideoProviderBundle\Form;

use UEC\MediaBundle\Form\FormProcessorInterface;
use UEC\MediaVideoProviderBundle\FileSystem\FileInfo;

class FormProcessor implements FormProcessorInterface
{
    /**
     * {@inheritdoc}
     */
    public function getFileInfo($file)
    {
        if (empty($file)) {
            return new FileInfo();
        }

        return new FileInfo($file);
    }
} 