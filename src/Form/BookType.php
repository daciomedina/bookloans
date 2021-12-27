<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\BooksGenreDef;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bookName')
            ->add('authorName')
            ->add('qty')
            ->add('bookGenreRel', EntityType::class,[
                'class'       => BooksGenreDef::class,
                'multiple'    => false,
                'expanded'    => false,
                'required'    => true,
                'label'       => "Género",
                'placeholder' => "Seleccionar Género"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
