<?php

namespace App\Form;

use App\Entity\Associations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AssociationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label' => 'association_name',
                'required' => true,
                'constraints' => [new Length(['max' => 100])]
            ])
            ->add('email', EmailType::class, [
                'label' => 'association_email',
                'required' => true,
            ])
            ->add('address', null, [
                'label' => 'association_address',
                'required' => true,
                'constraints' => [new Length(['max' => 100])]
            ])
            ->add('zip', null, [
                'label' => 'association_zip',
                'required' => true,
                'constraints' => [new Length(['max' => 10])],
                ])
            ->add('city', null, [
                'label' => 'association_city',
                'required' => true,
                'constraints' => [new Length(['max' => 100])]
                ])
            ->add('fixNumber', null, [
                'label' => 'association_fixNumber',
                'required' => false,
                'constraints' => [new Length(['max' => 10])]
                ])
            ->add('cellNumber', null, [
                'label' => 'association_cellNumber',
                'required' => false,
                'constraints' => [new Length(['max' => 10])]
                ])
            ->add('faxNumber', null, [
                'label' => 'association_faxNumber',
                'required' => false,
                'constraints' => [new Length(['max' => 10])]
                ])
            ->add('description', TextareaType::class, [
                'label' => 'association_description',
                'required' => false,
                ])
            ->add('picture', FileType::class, [
                'label' => 'association_picture',
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            "image/png", 
                            "image/jpeg", 
                            "image/jpg", 
                            "image/gif"
                        ],
                        'mimeTypesMessage' => 'Image non valide. Probléme de format ou de taille.',
                    ])
                ],
                'data_class' => null])
            ->add('webSite', UrlType::class, [
                'label' => 'association_website',
                'required' => false,
                'constraints' => [new Length(['max' => 200])]])
            ->add('facebook', UrlType::class, [
                'label' => 'association_facebook',
                'required' => false,
                'constraints' => [new Length(['max' => 200])]
                ])
            ->add('linkedin', UrlType::class, [
                'label' => 'association_linkedin',
                'required' => false,
                'constraints' => [new Length(['max' => 200])]])
            ->add('youtube', UrlType::class, [
                'label' => 'association_youtube',
                'required' => false,
                'constraints' => [new Length(['max' => 200])]
                ])
            ->add('twitter', UrlType::class, [
                'label' => 'association_twitter',
                'required' => false,
                'constraints' => [new Length(['max' => 200])]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Associations::class,
        ]);
    }
}
