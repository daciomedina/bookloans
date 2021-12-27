<?php

namespace App\Form;

use App\Entity\BooksLoans;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BooksLoansType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('logdate')
            //->add('returned')
            ->add('UserDNI')
            ->add('UserName')
            ->add('UserPhone')
            ->add('book_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BooksLoans::class,
        ]);
    }
}
