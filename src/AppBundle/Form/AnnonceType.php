<?php
/**
 * Created by PhpStorm.
 * User: Diginamic01
 * Date: 11/09/2018
 * Time: 16:24
 */

namespace AppBundle\Form;

use AppBundle\Entity\Ad;
use AppBundle\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $option)
    {
        return $builder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('city', TextType::class)
            ->add('zip',TextType::class)
            ->add('price', IntegerType::class)
            ->add('category',EntityType::class,[
                'class'=>Category::class,
                'choice_label' => 'nameUpper',
                'placeholder' => '-- Choisir Categorie --',
            ])
            ->add('dateCreated', DateType::class,[
                "data" => new \DateTime()
            ])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class
        ]);
    }
}