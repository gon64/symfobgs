<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controler\OfferController;

    /*
     * TODO ALL  
    */

class DefaultController extends AbstractController
{
	/**
	 * Route("/")
	 */

    public function index()
    {
        return $this->redirect('/offer/listAll');

        $number = random_int(0, 100);

        return $this->render('lucky/number.html.twig', array(
		'number' => $number,
	));
    }
}

