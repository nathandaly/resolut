<?php

namespace App\Admin\Display;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\BooleanType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserAdmin extends AbstractAdmin
{
    /**
     * {@inheritdoc}
     */
    protected $datagridValues = [
        '_page' => 1,
        '_sort_by' => 'sortId',
        '_sort_order' => 'ASC',
    ];

    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $show)
    {
        $show
            ->with('General')
                ->add('username')
                ->add('email')
            ->end()
            // .. more info
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('username')
                ->add('email')
                ->add('plainPassword', TextType::class, [
                    'required' => false]
                )
            ->end()
            // .. more info
        ;

        $formMapper->with('Management');

        $currentLoggedInUser = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();

        if ($currentLoggedInUser->hasRole('ROLE_SUPER_ADMIN')) {
            $container = $this->getConfigurationPool()->getContainer();
            $roles = $container->getParameter('security.role_hierarchy.roles');

            $formMapper
                ->add('roles', ChoiceType::class, [
                    'choices' => array_combine(array_keys($roles), array_keys($roles)),
                    'expanded' => false,
                    'multiple' => true,
                    'sortable' => true,
                    'required' => false
                ]);
            ;
        }

        if (!$currentLoggedInUser->hasRole('ROLE_SUPER_ADMIN') && $this->getSubject()->hasRole('ROLE_SUPER_ADMIN')) {
            $formMapper
                ->add('enabled', BooleanType::class, [
                    'required' => false
                ])
            ;
        } elseif ($currentLoggedInUser->hasRole('ROLE_SUPER_ADMIN')) {
            $formMapper
                ->add('enabled', BooleanType::class, [
                    'required' => false
                ])
            ;
        }

        $formMapper->end();
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('email')
            ->add('enabled', null, array('editable' => true))
            ->add('locked', null, array('editable' => true))
            ->add('createdAt')
        ;

        if ($this->isGranted('ROLE_ALLOWED_TO_SWITCH')) {
            $listMapper
                ->add('impersonating', 'string', array('template' => 'SonataUserBundle:Admin:Field/impersonating.html.twig'))
            ;
        }
    }
}