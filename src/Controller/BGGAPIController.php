<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
                $json = json_encode($xml);
                $array = json_decode($json,true);
		return $this->json($array);
	}

}
