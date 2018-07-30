<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Propuesta;


class OfferController extends Controller
{
    /**
     * @Route("/offer", name="offer")
     */
    public function index()
    {
		return $this->listAll();
    }

	/**
     * @Route("/offer/listAll", name="offer")
     */
	public function listAllAction(){

		$offers = $this->getDoctrine()->getRepository('App\Entity\Propuesta')->findAll();


		return $this->render(
			'offer/index.html.twig',
			array('controller_name' => 'controlador')
//			array('offers' => $offers)
		);
	}


	public function createOneAction(){
		$repository = $this->getDoctrine()->getRepository('App\Entity\Propuesta');

		$propuesta = new Propuesta;

		//$repository
	}	

}
