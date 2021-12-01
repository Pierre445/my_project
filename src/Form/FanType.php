<?php

namespace App\Form;

use App\Entity\Fan;
use App\Entity\Hero;


use Symfony\Component\Form\AbstractType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class FanType extends AbstractType
{
    private $doctrine;

    public function __construct(ManagerRegistry $doc)
    {
        $this->doctrine=$doc;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $repo= $this->doctrine->getManager()->getRepository(Hero::class);
        $listeHeros=$repo->findAll();

        $builder
        ->add("nom",TextType::class)
        ->add("puissance",IntegerType::class)
        ->add("hero",EntityType::class,[
            'class'=>Hero::class,
            'choices'=>$listeHeros
        ])
        ->add("ok",SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fan::class,
        ]);
    }
}
