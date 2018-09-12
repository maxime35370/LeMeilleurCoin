<?php
/**
 * Created by PhpStorm.
 * User: Diginamic01
 * Date: 07/09/2018
 * Time: 16:56
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Ad;
use AppBundle\Form\AnnonceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/annonce", name="annonce_")
 */
class AnnonceController extends Controller
{
    /**
     * @Route("/list", name="liste")
     */
    public function listAction(Request $request)
    {
        /*$adRepository = $this
            ->getDoctrine()
            ->getRepository(Ad::class);

       $listAd = $adRepository->findAll();
       //dump($listAd);*/
        $price = $request->get('price',0);

        $listAd=$this
            ->getDoctrine()
            ->getRepository(Ad::class)
            ->findAdWithPriceGreaterThanPrice($price);

        return $this->render('annonce/list.html.twig',[
            "listAd" => $listAd,
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/depose", name="depose")
     */
    public function deposeAction(Request $request)
    {

        /*Création d'un bouchon en base via :
        $ads = [
            ['Titre 1','description 1','Ville 1', 'CP 1', 45],
            ['Titre 2','description 2','Ville 2', 'CP 2', 20],
            ['Titre 3','description 3','Ville 3', 'CP 3', 900],
            ['Titre 4','description 4','Ville 4', 'CP 4', 1500],
            ['Titre 5','description 5','Ville 5', 'CP 5', 205],
            ['Titre 6','description 6','Ville 6', 'CP 6', 4],
        ];

        $em = $this->getDoctrine()->getManager();
        foreach ($ads as $uad)
        {
            $ad= new Ad();
            $ad->setTitle($uad[0]);
            $ad->setDescription($uad[1]);
            $ad->setCity($uad[2]);
            $ad->setZip($uad[3]);
            $ad->setPrice($uad[4]);
            $ad->setDateCreated(new \DateTime());

            $em->persist($ad);
        }

        $em->flush();

        $adRepository = $this
            ->getDoctrine()
            ->getRepository(Ad::class);

        $listAd = $adRepository->findAll();
        foreach ($listAd as $ad){
            $em = $this->getDoctrine()->getManager();
            $em->remove($ad);
        }

        $em = $this->getDoctrine()->getManager();
        $ad = new Ad();
        $ad->setTitle("Titre de l'annonce 1");
        $ad->setDescription("Description de l'annonce 1");
        $ad->setCity('Rennes');
        $ad->setZip('35500');
        $ad->setPrice(45);
        $ad->setDateCreated(new \DateTime());

        $em->persist($ad);
        $em->flush();*/

        $ad = new Ad();

        $form = $this->createForm(AnnonceType::class, $ad);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($ad);
            $entityManager->flush();
        }

        return $this->render('annonce/depose.html.twig',[
            'form' => $form->CreateView()
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/details/{id}", name="details")
     */
    public function DetailsAction(Request $request)
    {
        $id = $request->get('id');

        $ad=$this
            ->getDoctrine()
            ->getRepository(Ad::class)
            ->find($id);

        return $this->render('annonce/details.html.twig',[
            "ad" => $ad
        ]);
    }
}

