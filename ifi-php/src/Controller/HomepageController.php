<?php
/**
 * Created by PhpStorm.
 * User: tartara
 * Date: 29/11/17
 * Time: 09:00
 */

namespace App\Controller;


use App\Entity\Tournament;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends AbstractController {

    /**
     * @Route("/homepage", name="homepage")
     */
    public function index(Request $request)
    {
        $tournaments = $this->getDoctrine()->getManager()->getRepository(Tournament::class)//on recupere le repository de la class
        ->findAll();//retourne toutes les lignes de la table
        return $this->render(
            "homepage.html.twig",
            [
                'tournaments' => $tournaments
                //,'message' => $request->query->get('message',"default")
            ]);
    }
}