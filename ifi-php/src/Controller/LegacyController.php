<?php
/**
 * Created by PhpStorm.
 * User: tartara
 * Date: 29/11/17
 * Time: 09:11
 */

declare(strict_types=1); //force le respect du typage
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * @Route("/")
 */
class LegacyController
{
    private $mTwig;

    public function  __construct(Environment $sTwig)
    {
        $this->mTwig = $sTwig;
    }

    public function __invoke():Response
    {
        return new Response(
            $this->mTwig->render("homepage.html.twig")
        );
    }
}