<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
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

    public function nuevoAction(Request $request){
		
		$juego = new Juego();
/*	
		$id_bgg = random_int(190042,199042);
	
		$entityManager = $this->getDoctrine()->getManager();

		$juego->setIdBgg($id_bgg);
		$juego->setUrlPortada('');


		$entityManager->persist($juego);
		$entityManager->flush();
		return $this->listAllAction($request);
 */
		return $this->render(
                        'juego/nuevo.html.twig',
                        array(
                                'controller_name' => 'nombre de controlador',
                ));
	}

	/**
	 * @Route("/juego/listAll")
	 */

	public function listAllAction(Request $request){

		$juegos = $this->getDoctrine()->getRepository(Juego::class)->findAll();


		return $this->render(
			'juego/list.html.twig',
			array(
				'controller_name' => 'nombre de controlador',
				'juegos' => $juegos
		));
	}

}
