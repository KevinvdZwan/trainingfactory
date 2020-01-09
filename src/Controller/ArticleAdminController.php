<?php

namespace App\Controller;


use App\Entity\Training;
use App\Form\ArticleFormType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ArticleAdminController extends AbstractController
{
    /**
     * @Route("/article/registratie", name="article_registratie")
     */
    public function new(EntityManagerInterface $em, Request $request)
    {
        $form = $this->createForm(ArticleFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dd($form->getData());
        }
        return $this->render('/article/registration.html.twig', [
            'trainingForm' => $form->createView()
        ]);

    }

    public function edit(Training $training)
    {
        dd($training);
    }

}
