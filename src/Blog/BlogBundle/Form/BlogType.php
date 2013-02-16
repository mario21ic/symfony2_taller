<?php
namespace Blog\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titulo');
        $builder->add('contenido', 'textarea');
    }

    public function getName()
    {
        return 'blog';
    }
}
