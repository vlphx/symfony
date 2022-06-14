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

use App\Form\MoteurFormType;
use App\Form\VehiculeFormType;

use App\Entity\Roue;
use App\Entity\Chassis;
use App\Entity\Moteur;
use App\Entity\Couleur;
use App\Entity\Vehicule;

class MiawProjectController extends AbstractController
{
    /**
     * @Route("/miaw_project", name="app_miaw_project")
     */
    public function index(): Response
    {
        return $this->render('miaw_project/title.html.twig', [
            'title' => 'Date du jour et l\'heure',
            'date'  => date('d/m/Y'),
            'heure' => date('H:i:s')
        ]);
    }
    /**
     * @Route("/miaw_project/exo1")
     */
    public function exo1(): Response
    {
        return $this->render('miaw_project/exo1.html.twig', [
            'animals' => ['cat','dog','lion','horse','zebra','monkey'],
        ]);
    }
    /**
     * @Route("/new_roue", name="new_roue")
     */
    public function newRoue(Request $request): Response
    {
        $roue = new Roue;
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $roue);

        $formBuilder
            ->add('diametre', TextType::class)
            ->add('save', SubmitType::class)
            ;
        $form = $formBuilder -> getForm();

        if ($request->isMethod('POST'))
        {
            if ($form->handleRequest($request)->isValid())
            {

                $roue = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager ->persist($roue);
                $entityManager ->flush();

                $message =  'La roue de diamètre '.$roue->getDiametre().' a été bien crée';
            //     return $this->render('miaw_project/form-roue.html.twig', ['form' => $form -> createView(), 'roue' => $roue 
            // ]);
            }
            else{
                $message = 'Erreur :';
            }
        }
        else{
            $message = 'Entrer le diamètre de la roue';
        }
        return $this->render('miaw_project/form-roue.html.twig', ['form' => $form -> createView(), 'message' => $message
        ]);
    }
        /**
     * @Route("/new_moteur", name="new_moteur")
     */
    public function newMoteur(Request $request): Response
    {
        $moteur = new Moteur;
        $formBuilder = $this->get('form.factory')->createBuilder(MoteurFormType::class, $moteur);

        $form = $formBuilder -> getForm();

        if ($request->isMethod('POST'))
        {
            if ($form->handleRequest($request)->isValid())
            {

                $moteur = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager ->persist($moteur);
                $entityManager ->flush();

                $message =  'Nouveau moteur enresgistré';
            }
            else{
                $message = 'Erreur !';
            }
        }
        else{
            $message = 'Entrer les infos';
        }
        return $this->render('miaw_project/form-moteur.html.twig', ['form' => $form -> createView(), 'message' => $message
        ]);
    }
        /**
     * @Route("/new_vehicule", name="new_vehicule")
     */
    public function newVehicule(Request $request): Response
    {
        $vehicule = new Vehicule;
        $formBuilder = $this->get('form.factory')->createBuilder(VehiculeFormType::class, $vehicule);

        $form = $formBuilder -> getForm();

        if ($request->isMethod('POST'))
        {
            if ($form->handleRequest($request)->isValid())
            {

                $vehicule = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager ->persist($vehicule);
                $entityManager ->flush();

                $message =  'Nouveau vehicule enresgistré';
            }
            else{
                $message = 'Erreur !';
            }
        }
        else{
            $message = 'Entrer les infos';
        }
        return $this->render('miaw_project/form-vehicule.html.twig', ['form' => $form -> createView(), 'message' => $message
        ]);
    }
    /**
     * @Route("/add_roue/{diametre}", name="add_roue")
     */
    public function addRoue($diametre): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $maRoue = new Roue();
        $maRoue->setDiametre($diametre);
        
        $entityManager->persist($maRoue);

        $entityManager->flush();

        return $this->render('miaw_project/create.html.twig', ['roue' => $maRoue 
        ]);
    }
    /**
     * @Route("/add_chassis/{longueur}/{largeur}", name="add_chassis")
     */
    public function addChassis($longueur, $largeur): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $monChassis = new Chassis();
        $monChassis->setLongueur($longueur);
        $monChassis->SetLargeur($largeur);
        
        $entityManager->persist($monChassis);

        $entityManager->flush();

        return $this->render('miaw_project/create.html.twig', ['chassis' => $monChassis
        ]);
    }
    /**
     * @Route("/add_moteur/{energie}/{puissance}", name="add_moteur")
     */
    public function addMoteur($energie, $puissance): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $monMoteur = new Moteur();
        $monMoteur->setEnergie($energie);
        $monMoteur->SetPuissance($puissance);
        
        $entityManager->persist($monMoteur);

        $entityManager->flush();

        return $this->render('miaw_project/create.html.twig', ['moteur' => $monMoteur
        ]);
    }
    /**
     * @Route("/add_couleur/{couleur}", name="add_couleur")
     */
    public function addCouleur($couleur): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $monCouleur = new Couleur();
        $monCouleur->setNomCouleur($couleur);
        
        $entityManager->persist($monCouleur);

        $entityManager->flush();

        return $this->render('miaw_project/create.html.twig', ['couleur' => $monCouleur
        ]);
    }

    /**
     * @Route("/roues/list", name="list_roues")
     */
    public function listRoues()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $roues = $entityManager->getRepository(Roue::class)->findAll();

        return $this->render('miaw_project/list-roues.html.twig', ['roues' => $roues
        ]);
    }

    /**
     * @Route("/roues/show/{uid}", name="show_roue")
     */
    public function showRoue($uid)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $roue = $entityManager->getRepository(Roue::class)->find($uid);

        return $this->render('miaw_project/show-roue.html.twig', ['roue' => $roue
        ]);
    }

    /**
     * @Route("/vehicules/list", name="list_vehicules")
     */
    public function listVehicules()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $vehicules = $entityManager->getRepository(Vehicule::class)->findAll();

        return $this->render('miaw_project/list-vehicules.html.twig', ['vehicules' => $vehicules
        ]);
    }
}
