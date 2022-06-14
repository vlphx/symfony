<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DataType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use App\Form\LivreFormType;

use App\Entity\Livre;
use App\Entity\Auteur;

class ExamController extends AbstractController
{

    /**
     * @Route("/new_livre", name="new_livre")
     */
    public function newLivre(Request $request): Response
    {
        $livre = new Livre;
        $formBuilder = $this->get('form.factory')->createBuilder(LivreFormType::class, $livre);

        $form = $formBuilder -> getForm();

        if ($request->isMethod('POST'))
        {
            if ($form->handleRequest($request)->isValid())
            {

                $livre = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager ->persist($livre);
                $entityManager ->flush();

                $message =  'Nouveau livre enresgistré !';
            }
            else{
                $message = 'Erreur !';
            }
        }
        else{
            $message = 'Entrer les infos';
        }
        return $this->render('exam/form-livre.html.twig', ['form' => $form -> createView(), 'message' => $message
        ]);
    }


    /**
     * @Route("/livres/liste", name="liste_livres")
     */
    public function listeLivres()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $livres = $entityManager->getRepository(Livre::class)->findAll();

        return $this->render('exam/liste-livres.html.twig', ['livres' => $livres
        ]);
    }

    /**
     * @Route("/livre/show/{uid}", name="show_livre")
     */
    public function showLivre($uid)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $livre = $entityManager->getRepository(Livre::class)->find($uid);

        return $this->render('exam/show-livre.html.twig', ['livre' => $livre
        ]);
    }

    /**
     * @Route("/auteur/show/{uid}", name="show_auteur")
     */
    public function showAuteur($uid)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $auteur = $entityManager->getRepository(Auteur::class)->find($uid);

        return $this->render('exam/show-auteur.html.twig', ['auteur' => $auteur
        ]);
    }

    /**
     * @Route("/livres/liste/{categorie}", name="show_livres_by_categorie")
     */
    public function showLivreByCategorie($categorie)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $livres = $entityManager->getRepository(Livre::class)->findBy(['Categorie' => $categorie]);

        return $this->render('exam/liste-livres-by-categorie.html.twig', ['livres' => $livres
        ]);
    }
}