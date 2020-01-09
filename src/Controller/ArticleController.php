<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleFormType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/home", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('article/home.html.twig');
    }

    /**
     * @Route("/contact")
     */
    public function show()
    {
        return $this->render('article/contact.html.twig');
    }

    /**
     * @Route("/registratie")
     */
    public function show1()
    {
        return $this->render('article/registration.html.twig');
    }

    /**
     * @Route("/addtraining")
     */
    public function addTraining()
    {
        return $this->render('article/add-training.html.twig');
    }
}?>
