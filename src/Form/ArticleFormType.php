<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('Voornaam')
            ->add('Tussenvoegsel')
            ->add('Achternaam')
            ->add('Geboortedatum')
            ->add('Gebruikersnaam')
            ->add('Voer_uw_wachtwoord_in')
            ->add('Voer_uw_wachtwoord_opnieuw_in')


        ;
    }
}
