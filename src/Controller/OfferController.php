<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Oferta;
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

		$offers = $this->getDoctrine()->getRepository('App\Entity\Oferta')->findAll();


		return $this->render(
			'offer/lista.html.twig',
			array(
				'ofertas' => $offers
				)
		);
	}

	/**
	 * @Route("/oferta/nuevo/{step}")
	 */
	public function nuevaOfertaAction(Request $request, $step = 1) {
		if ( $step == 1 ) {
			$em = $this->getDoctrine()->getManager();

			$juego = $this->getDoctrine()
				->getRepository(Juego::class)
				->findOneBy([
					'id_bgg' => $request->request->get('bgg_id')
				]);
			return $this->render(
				'offer/nuevo.html.twig',
				array(
					'juego' => $juego
				)
			);
		} else {
			switch ( $step ) {
				case 2:
					die ("hello");
					break;
				default: 
					break;
			}	
		}
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
