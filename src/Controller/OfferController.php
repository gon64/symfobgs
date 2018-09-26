<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Propuesta;
use App\Entity\Juego;


class OfferController extends AbstractController {
	/**
	 * @Route("/offer", name="offer")
	 */
	public function index() {
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
		);
	}

	/**
	 * @Route("offer/makeNew")
	 */
	public function createOneAction(Juego $juego){
//		var_dump($juego->getIdBgg());
		$id_bgg = $juego->getIdBgg();
		return $this->render(
			'offer/nuevo.html.twig',
			array(
//				'controller_name' => 'nombre de controlador',
				'controller_name' => $id_bgg
			)	
		);
	}	

}
