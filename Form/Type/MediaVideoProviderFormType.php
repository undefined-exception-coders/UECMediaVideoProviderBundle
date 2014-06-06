<?php

namespace UEC\MediaVideoProviderBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use UEC\MediaVideoProviderBundle\Model\MediaVideoProvider;

class MediaVideoProviderFormType extends AbstractType
{
    protected $modelClass;

    function __construct($modelClass)
    {
        $this->modelClass = $modelClass;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('provider', 'choice', array(
                'label' => 'label.provider',
                'choices' => array_combine(
                    MediaVideoProvider::getProviders(),
                    MediaVideoProvider::getProviders()
                ),
                'translation_domain' => 'UECMediaVideoProviderBundle'
            ))
            ->add('media', 'uec_media_video_provider_form_media')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->modelClass,
        ));
    }

    public function getName()
    {
        return 'uec_media_video_provider_form';
    }
} 