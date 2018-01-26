<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Marsupilami;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarsupilamiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('amis', null, [
            'attr' => ['class' => 'friends_list']
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data' => Marsupilami::class,
        ]);
    }
}