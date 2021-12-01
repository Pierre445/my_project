<?php

namespace App\Controller;
use  App\Entity\Hero;
use  App\Entity\Mechant;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MechantController extends AbstractController
{
    /**
     * @Route("/mechants", name="mechant")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo=$doctrine->getManager()->getRepository(mechant::class);
        $liste_mechants=$repo->findAll();


        return $this->render('mechant/index.html.twig', [
            'liste_mechants' => $liste_mechants,
        ]);
    }

    /**
     * @Route("/ajouTest", name="ajout_test")
     */

    public function ajoutMechantTest(ManagerRegistry $doctrine): Response
    {
        $magneto=new Mechant();
        $magneto->setNom("Einstein")
                ->setPseudo("Magneto")
                ->setPuissance(100);

        $em=$doctrine->getManager();
        
        

        $batman = new Hero();
        $batman->setPrenom("Bruce");
        $batman->setNom("Wayne");
        $batman->setPseudo("Batman");
        $batman->setPuissance(100);
        //$batman->setPseudo("Batman");

        $batman->setRival($magneto);
        $magneto->setRival($batman);
        
        $em->persist($batman);
        $em->persist($magneto);
        $em->flush();
        
        

        return $this->json($batman);
    }

    /**
     * @Route("/showoneMechant/{id}", name="unmechant")
     */

    public function Show(ManagerRegistry $doctrine,int $id): Response
    {
        $em=$doctrine->getManager();
        $repo=$em->getrepository(Mechant::class);
        $mechant=$repo->find($id);
        return $this->json($mechant);
    }

    /**
     * @Route("/ajoutmechant", name="ajout_mechant")
     */

    public function ajout(Request $request, ManagerRegistry $doctrine): Response
    {
    $mechant=new Mechant();

    // $repo=$doctrine->getManager()->getRepository(Hero::class);
    // $listeHeros=$repo->findAll();

    $em=$doctrine->getManager();

    $form= $this->createFormBuilder($mechant)

    ->add("nom",TextType::class)
    ->add("pseudo",TestType::class)
    ->add("puissance",IntegerType::class)
    ->add("Créer",SubmitType::class)
    ->getForm();

    $form->handleRequest($request);
    if($form->isSubmitted()&&$form->isValid()){
        $mechant=$form->getData();
        $em->persist($mechant);
        $em->flush();
        dump($mechant);
    }

    return $this->renderForm("mechant/index.html.twig",["formulaire"=>$form]);
}

    
}