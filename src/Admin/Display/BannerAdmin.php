<?php

namespace App\Admin\Display;

use App\Entity\Banner;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BannerAdmin extends AbstractAdmin
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
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('introduction', TextType::class, [
                'required' => false
            ])
            ->add('title', TextType::class)
            ->add('description', TextType::class, [
                'required' => false
            ])
            ->add('imageUrl', TextType::class)
            ->add('status', ChoiceType::class, [
                'choices'  => array_combine(Banner::STATUS, Banner::STATUS)
            ])
            ->add('sortId', NumberType::class)
            ->add('buttonLabel', TextType::class, [
                'required' => false
            ])
            ->add('buttonUrl', TextType::class, [
                'required' => false
            ])
            ->add('buttonBgColour', TextType::class, [
                'label' => 'Button Background Hex Code',
                'required' => false
            ])
            ->add('buttonBgHoverColour', TextType::class, [
                'label' => 'Button Background Hover Hex Code',
                'required' => false
            ])
            ->add('buttonFgColour', TextType::class, [
                'label' => 'Button Forground Hex Code',
                'required' => false
            ])
            ->add('buttonFgHoverColour', TextType::class, [
                'label' => 'Button Forground Hover Hex Code',
                'required' => false
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('imageUrl', 'text', [
                'editable' => true
            ])
            ->add('status', 'choice', [
                'choices'  => array_combine(Banner::STATUS, Banner::STATUS),
                'editable' => true
            ])
            ->add('sortId', 'integer', [
                'editable' => true
            ])
            ->add('buttonLabel', 'text', [
                'editable' => true
            ])
            ->add('buttonBgColour', 'text', [
                'editable' => true
            ])
            ->add('buttonBgHoverColour', 'text', [
                'editable' => true
            ])
            ->add('buttonFgColour', 'text', [
                'editable' => true
            ])
            ->add('buttonFgHoverColour', 'text', [
                'editable' => true
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function prePersist($banner)
    {
        $currentTimestampt = new \DateTime();

        $banner
            ->setCreatedAt($currentTimestampt)
            ->setUpdatedAt($currentTimestampt)
        ;

        parent::prePersist($banner);
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($banner)
    {
        $banner->setUpdatedAt(new \DateTime());

        parent::preUpdate($banner);
    }
}