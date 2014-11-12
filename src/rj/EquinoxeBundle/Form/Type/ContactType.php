<?php
# src/rj/EquinoxeBundle/Form/Type/ContactType.php

namespace rj\EquinoxeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email',array('label' => ucfirst('Email'),'attr'=> array('class'=>'form-control','placeholder'=>'Saisissez votre email')))
                ->add('subject', 'text',array('label' => ucfirst('Sujet'),'attr'=> array('class'=>'form-control','placeholder'=>'Saisissez l\'objet du message')))
                ->add('content', 'textarea',array('label' => ucfirst('Message'),'attr'=> array('class'=>'form-control','placeholder'=>'Votre message ici ...')));
    }

    public function getName()
    {
        return 'Contact';
    }
}
?>