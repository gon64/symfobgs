<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Juego;

class BGGAPIController extends Controller {
	/**
	 * @Route("BGGAPI", name="BGGAPI")
	 */
	public function index()
	{
	return $this->json(array('username' => 'jane.doe'));
	}

	/**
	 * @Route("BGGAPI/searchByName/{name}")
	 */
	public function searchByName($name){
	 	$url = "https://boardgamegeek.com/xmlapi/search?search=$name";
		$xml = simplexml_load_file($url);

		$json = json_encode($xml);
		$array = json_decode($json,true);
		return $this->json($array);

	}

	/**
	 * @Route("BGGAPI/getById/{id}")
	 */
	public function getById($id){
		$url = "https://www.boardgamegeek.com/xmlapi/boardgame/$id";
		$xml = simplexml_load_file($url);

		// $x("boardgames/boardgame/name[@primary]")[0].innerHTML

		$em = $this->getDoctrine()->getManager();
		$titulo = ((string) $xml->xpath("/boardgames/boardgame/name[@primary]")[0]);
		$image = ((string) $xml->xpath("/boardgames/boardgame/image")[0]);
		$yearpublished = ((int) $xml->xpath("/boardgames/boardgame/yearpublished")[0]);
		$minplayers = ((int) $xml->xpath("/boardgames/boardgame/minplayers")[0]);
		$maxplayers = ((int) $xml->xpath("/boardgames/boardgame/maxplayers")[0]);
		$playingtime = ((int) $xml->xpath("/boardgames/boardgame/playingtime")[0]);
		$age = ((int) $xml->xpath("/boardgames/boardgame/age")[0]);

/*
var_dump($playingtime);
var_dump($age);
die;
*/

                $juego = $this->getDoctrine()
                        ->getRepository(Juego::class)
                        ->findOneBy([
                                'id_bgg' => $id
			]);

		if (!$juego) {
                        $juego = new Juego();
                        $juego->setIdBgg($id);
			$juego->setUrlPortada($image);
			$juego->setTitulo($titulo);
			$juego->setYearpublished($yearpublished);
			$juego->setMinplayers($minplayers);
			$juego->setMaxplayers($maxplayers);
			$juego->setAge($age);
			$juego->setPlayingtime($playingtime);

                        $em->persist($juego);
                        $em->flush();
                }


/*
		echo $image;
		die;
 */



                $json = json_encode($xml);
                $array = json_decode($json,true);
		return $this->json($array);
	}
}
