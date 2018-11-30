<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Oferta;
use App\Entity\Juego;
use App\Constant\Game_Languages;


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

		//$offers = $this->getDoctrine()->getRepository('App\Entity\Oferta')->findAll();

		$offers = $this->getDoctrine()->getRepository('App\Entity\Oferta')->findAllOrderByDate();

		
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
		$em = $this->getDoctrine()->getManager();
		switch ( $step ) {
			case 1:
								
				$juego = $this->getDoctrine()
					->getRepository(Juego::class)
					->findOneBy([
						'id_bgg' => $request->get('bgg_id')
					]);
				return $this->render(
					'offer/nuevo.html.twig',
					array(
						'juego' => $juego
					)
				);
		
			case 2:
				$juego = $this->getDoctrine()
					->getRepository(Juego::class)
					->findOneBy([
						'id' => $request->get('game-id')
				]);
				$oferta = new Oferta();
				$oferta->setPrecio($request->get('game-price-input'));
				$oferta->setComentario($request->get('game-description-input'));
				$oferta->setUsuario($this->getUser());
				$oferta->setGameStatus($request->get('status-input'));
				$oferta->setSleeveStatus($request->get('sleeves-input'));
				$oferta->setJuego($juego);
				$oferta->setLat($this->getUser()->getLat());
				$oferta->setLon($this->getUser()->getLon());
				
				// usamos una mascara de bits para determinar los idiomas
				$languages = Game_Languages::UNSPECIFIED;
				foreach ($request->get('language-input') as $language) {
					$languages = $languages | $language;
				}
				$oferta->setLanguages($languages);
				

				
				$em->persist($oferta);
				$em->flush();

				return $this->render(
					'offer/select_location.html.twig', [
						'usuario' => $this->getUser(),
						'juego' => $juego,
						'oferta' => $oferta
					]
				);

			case 3:
				
			$oferta = $this->getDoctrine()
				->getRepository(Oferta::class)
				->findOneBy([
					'id' => $request->get('oferta-id')
			]);

			$oferta->setLat($request->get('locationpicker-lat'));
			$oferta->setLon($request->get('locationpicker-lon'));

			$em->persist($oferta);
			$em->flush();
	
			return $this->render(
				'user/profile.html.twig', [
					'usuario' => $this->getUser()
				]
			);



			default: 
				break;
		}	
	}


	/**
	 * @Route("offer/makeNew")
	 */
	public function createOneAction(Juego $juego){
		$id_bgg = $juego->getIdBgg();
		return $this->render(
			'offer/nuevo.html.twig',
			array(
				'controller_name' => $id_bgg
			)	
		);
	}	

}
