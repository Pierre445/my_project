<?php

namespace App\Controller;
use App\Entity\Hero;
use App\Entity\Fan;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class HeroController extends AbstractController
{
    private $listeHero =array();
    /**
     * @Route("/hero/{id}", name="showOneHero")
     */
    public function listOne(int $id): Response
    {
       $superman = new Hero();
       $superman->setNom('Kent');
       $superman->setPrenom('Clark');
       $superman->setPseudo('Superpigeon');

       $batman = new Hero();
       $batman->setNom('Wayne');
       $batman->setPrenom('Bruce');
       $batman->setPseudo('Batcouille');

       $flash = new Hero();
       $flash->setNom('Allen');
       $flash->setPrenom('Barry');
       $flash->setPseudo('Flashouille');

       $this->listeHero = array($superman, $batman, $flash);
       
        $hero = $this->listeHero[$id];
        dump($hero);


        return $this->render('hero/show.html.twig', [
            'hero' => $hero
        ]);
    }

    /**
     * @Route("/", name="listeAllHero")
     */
    public function listAll(): Response
    {
       $superman = new Hero();
       $superman->setPrenom('Clark');
       $superman->setNom('Kent');
       $superman->setPseudo('Superman');
       $superman->setPuissance('100');

       $batman = new Hero();
       $batman->setPrenom('Bruce');
       $batman->setNom('Wayne');
       $batman->setPseudo('Batman');
       $batman->setPuissance('100');

       $flash = new Hero();
       $flash->setPrenom('Barry');
       $flash->setNom('Allen');
       $flash->setPuissance('100');
       $flash->setPseudo('Flash');

       $this->listeHero = array($superman, $batman, $flash);



        return $this->render('hero/index.html.twig', [
            'listeHeros' => $this->listeHero
        ]);
    }

    /**
     * @Route("/ajouterRandomFan/{id}", name="ajoutRandomFan")
     */
    public function ajoutRandomFan(int $id,ManagerRegistry $doctrine): Response
    {
        $hero=$doctrine->getManager()->getRepository(Hero::class)->find($id);

        dump($hero);
        $em=$doctrine->getManager();
        $fan1=new Fan();
        $fan1->setNom("numero de fan".rand(0,1000));
        $fan1->setPuissance(1000);

        $fan2=new Fan();
        $fan2->setNom("numero de fan".rand(0,1000));
        $fan2->setPuissance(1000);

       
        $em->persist($fan1);
        $em->persist($fan2);
        
       
        $fan1->setHero($hero);
        $fan2->setHero($hero);
        $em->refresh($hero);
        $em->flush();
        

        return $this->render('hero/show.html.twig', [
            'hero' => $hero
        ]);
    
    }
}
