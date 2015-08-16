<?php

namespace Rofil\Simple\ContentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'attr'  => [ 'class' => 'form-control', 'placeholder' => 'Masukan data title' ],
                'label' => '',
            ])
            ->add('categories', null, [
                'attr'  => [ 'class' => 'form-control', 'placeholder' => 'Masukan data title' ],
                'label' => '',
            ])
            ->add('body', null, [
                'attr'  => [ 'class' => 'form-control', 'placeholder' => 'Masukan data body' ],
                'label' => '',
            ])
            ->add('published', null, [
                'attr'  => [ 'class' => '', 'placeholder' => 'Masukan data published' ],
                'label' => '',
            ])
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rofil\Simple\ContentBundle\Entity\News'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rofil_simple_contentbundle_news';
    }
}
