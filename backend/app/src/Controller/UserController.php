<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;

class UserController extends Controller
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        // replace this line with your own code!
        return $this->render("base.html.twig", []);
    }

    /**
     * @Route("/register", name="register")
     */
    public function register()
    {

    }

    /**
     * @Route("/login", name="login")
     */
    public function login()
    {

    }
}
