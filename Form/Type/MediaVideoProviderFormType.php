<?php

namespace UEC\MediaVideoProviderBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaVideoProviderFormType extends AbstractType
{
    protected $modelClass;
    protected $providers;

    function __construct($modelClass, array $providers)
    {
        $this->modelClass = $modelClass;
        $this->providers = array_keys($providers);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('provider', 'choice', array(
                'label' => 'label.provider',
                'choices' => array_combine(
                    $this->providers,
                    $this->providers
                ),
            ))
            ->add('media', 'uec_media_video_provider_form_media')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
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