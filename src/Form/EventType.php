<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Title')
            ->add('Email')
            ->add('Phone')
            ->add('Date' ,DateType::class, [
                'widget' => 'single_text', // Afficher en tant qu'entrée texte unique
                'format' => 'yyyy-MM-dd', // Définir le format de date souhaité
 ])          
           ->add('Category', ChoiceType::class, [
               'choices' => [
                    'WEEDING' => 'WEDDING',
                    'BIRTHDAY CELEBRATION' => 'BIRTHDAY CELEBRATION',
                    'PARTY' => 'PARTY',
                    'CONFERENCE' => 'CONFERENCE',
    ],
])          
            ->add('Description')
         
            //->add('user')
           // ->add('partenaire')
           
           ->add('Submit',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
