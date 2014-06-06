<?php

namespace UEC\MediaVideoProviderBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class UrlProvider extends Constraint
{
    public $message = 'Invalid url "%string%"';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

    public function validatedBy()
    {
        return 'url_provider';
    }
} 