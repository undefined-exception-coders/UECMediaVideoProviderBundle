<?php

namespace UEC\MediaVideoProviderBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use UEC\MediaVideoProviderBundle\Http\HttpInterface;

class UrlProviderValidator extends ConstraintValidator
{
    protected $http;

    function __construct(HttpInterface $http)
    {
        $this->http = $http;
    }

    public function validate($mediaProvider, Constraint $constraint)
    {
        $provider = $mediaProvider->getProvider();
        $url = $mediaProvider->getMedia()->getFile();

        if (null === $this->http->getInfoUrl($provider, $url)) {
            $this->context->addViolationAt(
                'media.file',
                $constraint->message,
                array('%string%' => $url)
            );
        }
    }
} 