<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    /**
     * @Route("/user/{username}", name="profile")
     */
    public function index($username = null)
    {
        if (is_null($username)){
            //TODO  lanzar excepción
        } else {

            $usuario = $this->getDoctrine()->getRepository('App\Entity\Usuario')->findOneBy(['usuario' => $username]);

            return $this->render('user/profile.html.twig', [
                    'usuario' => $usuario
            ]);
        }
    }
}
