<?php
/**
 * Created by PhpStorm.
 * User: Diginamic01
 * Date: 13/09/2018
 * Time: 12:30
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route(name="login", path="/login")
     */
    public function loginAction(AuthenticationUtils $authentificationUtils)
    {
        $error = $authentificationUtils->getLastAuthenticationError();
        $lastUserName = $authentificationUtils->getLastUsername();
        return $this->render('security/login.html.twig',[
            'last_username' => $lastUserName,
            'error' => $error,
        ]);
    }
}