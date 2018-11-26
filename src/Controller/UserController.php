<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @Route("/user/setLocation/{userId}")
     */
    public function setLocation(Request $request, $userId){
        if (is_null($userId)) {
            //TODO lanzar excepción
        } else {
            $usuario = $this->getDoctrine()->getRepository('App\Entity\Usuario')->findOneBy(['id' => $userId]);
            $currentUser = $this->getUser();

            if ($currentUser ===  $usuario) {
                $usuario->setDir($request->get('dir'));
                $usuario->setLat($request->get('lat'));
                $usuario->setLon($request->get('lon'));
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($usuario);
                $em->flush();
            } else {
                return $this->json(array('result' => 'KO_NOT_VALID_USER'));
            }
        }

        return $this->json(array('username' => 'OK'));
    }
}
