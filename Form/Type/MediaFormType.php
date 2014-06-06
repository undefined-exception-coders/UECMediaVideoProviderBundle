<?php

namespace UEC\MediaVideoProviderBundle\Form\Type;

use UEC\MediaBundle\Form\Type\MediaFormType as BaseMediaFormType;
use Symfony\Component\Form\FormBuilderInterface;

class MediaFormType extends BaseMediaFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', 'text', array(
                'label' => 'label.insert_url',
            ))
        ;
    }

    public function getName()
    {
        return 'uec_media_video_provider_form_media';
    }
} 