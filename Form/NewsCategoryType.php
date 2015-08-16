<?php

namespace Rofil\Simple\ContentBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsCategoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'attr'  => [ 'class' => 'form-control', 'placeholder' => 'Masukan data name' ],
                'label' => '',
            ])
            ->add('description', null, [
                'attr'  => [ 'class' => 'form-control', 'placeholder' => 'Masukan data description' ],
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
            'data_class' => 'Rofil\Simple\ContentBundle\Entity\NewsCategory'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rofil_simple_contentbundle_newscategory';
    }
}
