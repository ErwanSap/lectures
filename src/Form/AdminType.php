<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        //$form = $this->createFormBuilder()
            ->add('nom', TextType::class,[
                'label' => 'Nom du fichier'])
            ->add('description', TextType::class,[
                'label' => 'description'
            ])
            ->add('url', FileType::class)
            ->add('valider', SubmitType::class,[
            ])
            ->getForm()
        ;
        //return array('form'=>$form->createView);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=> Book::class,
        ]);
    }

    private function createFormBuilder()
    {
    }
}
