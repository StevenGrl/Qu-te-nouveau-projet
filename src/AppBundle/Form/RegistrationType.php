<?php
/**
 * Created by PhpStorm.
 * User: wilder4
 * Date: 09/05/18
 * Time: 15:23
 */

namespace AppBundle\Form;

use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends RegistrationFormType
{
    public function __construct()
    {
        parent::__construct('AppBundle\Entity\User');
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName')
            ->add('lastName')
            ->add('phoneNumber')
            ->add('birthDate')
            ->add('isACertifiedPilot');
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'appbundle_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
