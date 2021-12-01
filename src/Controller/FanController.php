<?php

namespace App\Controller;

use App\Entity\Fan;
use App\Entity\Hero;
use App\Form\FanType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FanController extends AbstractController
{
    /**
     * @Route("/ajouterfan", name="ajout_fan")
     */
    public function ajout(Request $request, ManagerRegistry $doctrine): Response
    {
        $fan=new Fan();

        $form= $this->createForm(FanType::class,$fan);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            $fan=$form->getData();
            
            dump($fan->getHero());
        }

        return $this->renderForm("fan/index.html.twig",["formulaire"=>$form]);
}
}