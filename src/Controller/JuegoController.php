<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \App\Entity\Juego;


class JuegoController extends Controller
{
    /**
     * @Route("/juego", name="juego")
     */
    public function index()
    {
        return $this->render('juego/index.html.twig', [
            'controller_name' => 'JuegoController',
        ]);
    }

	/**
	 * @Route("/juego/nuevo")
	 */

	public function nuevoAction(){
		$id_bgg = random_int(190042,199042);
		$entityManager = $this->getDoctrine()->getManager();
		$juego = new Juego();

		$juego->setIdBgg($id_bgg);
		$entityManager->persist($juego);
		return $this->listAllAction();
	}

	/**
	 * @Route("/juego/listAll")
	 */

	public function listAllAction(){

		$juegos = $this->getDoctrine()->getRepository(Juego::class)->findAll();


		return $this->render(
			'juego/list.html.twig',
			array(
				'controller_name' => 'nombre de controlador',
				'juegos' => $juegos
		));
	}

}
