<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Usuario;
use App\Constant\Security;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{

	

	/**
	 * @Route("/login", name="login")
	 */
	public function loginAction(AuthenticationUtils $authenticationUtils)	{
//		$authenticationUtils = $this->get('security.authentication_utils');
		$error = $authenticationUtils->getLastAuthenticationError();
		$lastUsername = $authenticationUtils->getLastUsername();
		return $this->render('security/login.html.twig', [
			'last_username' => $lastUsername,
			'error'         => $error,
		]);
	}

	/**
	 * @Route("/registro")
	 */
	public function registerAction(Request $request) {
		$user = new Usuario();
		if (
			null !== ($request->request->get('user')) && 
			null !== ($request->request->get('email')) && 
			null !== ($request->request->get('password'))
		) {
			$validation = $this->validateFields($request->request->get('user'), $request->request->get('email'), $request->request->get('password')  );
			//var_dump($request->request->get('user'));
			//var_dump($validation);

			// registramos al usuario
			$entityManager = $this->getDoctrine()->getManager();
			$usuario = new Usuario();
			$usuario->setUsuario($request->request->get('user'));
			$usuario->setEmail($request->request->get('email'));
			$usuario->setClave(password_hash($request->request->get('password'), PASSWORD_BCRYPT, array('cost' => 11)));
			$entityManager->persist($usuario);
			$entityManager->flush();

			return $this->render(
				( $validation == Security::VALID_PARAM ) ? 'security/login.html.twig' : 'security/register.html.twig',[
					'validation' => $validation 
			]);
		} else {
			// Estamos accediendo a registro por primera vez
			return $this->render(
				'security/register.html.twig'
			);
		}
	}

	public function validateFields($user, $email, $password){
		return ( $this->validateUsername($user) & $this->validateEmail($email) & $this->validatePassword($password) );
	}

	public function validateUsername($username) {
		//TODO validacion
                if ( false ) return Security::USER_INVALID;
                if ( false ) return Security::USER_ALREADY_EXISTS;
                return Security::VALID_PARAM;
	}

	public function validateEmail($email) {
		//TODO validacion
                if ( false ) return Security::EMAIL_INVALID;
                if ( false ) return Security::EMAIL_ALREADY_EXISTS;
                return Security::VALID_PARAM;
	}

	public function validatePassword($password) {
		//TODO validacion
		if ( false ) return Security::PASSWORD_INVALID;
		return Security::VALID_PARAM;
	}
}
