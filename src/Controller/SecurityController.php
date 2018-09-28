<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\Usuario;

class SecurityController extends AbstractController
{
	/**
	 * @Route("/login", name="login")
	 */
	public function loginAction(AuthenticationUtils $authenticationUtils)	{
//		$authenticationUtils = $this->get('security.authentication_utils');
		$error = $authenticationUtils->getLastAuthenticationError();
		$lastUsername = $authenticationUtils->getLastUsername();
		return $this->render('security/login.html.twig', array(
			'last_username' => $lastUsername,
			'error'         => $error,
		));
	}

	/**
	 * @Route("/registro")
	 */
	public function registerAction() {
		$user = new Usuario();
		return $this->render(
			'security/register.html.twig'
		);
	}
}
