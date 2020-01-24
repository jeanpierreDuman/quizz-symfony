<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Question : "
            ])
            ->add('reply1', TextType::class, [
                'label' => "Réponse 1 : "
            ])
            ->add('reply2', TextType::class, [
                'label' => "Réponse 2 : "
            ])
            ->add('reply3', TextType::class, [
                'label' => "Réponse 3"
            ])
            ->add('reply4', TextType::class, [
                'label' => "Réponse 4 : "
            ])
            ->add('truth1', CheckboxType::class, [
                'label' => "La réponse 1 est la bonne ?",
                'required' => false
            ])
            ->add('truth2', CheckboxType::class, [
                'label' => "La réponse 2 est la bonne ?",
                'required' => false
            ])
            ->add('truth3', CheckboxType::class, [
                'label' => "La réponse 3 est la bonne ?",
                'required' => false
            ])
            ->add('truth4', CheckboxType::class, [
                'label' => "La réponse 4 est la bonne ?",
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
