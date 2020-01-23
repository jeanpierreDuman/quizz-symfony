<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function index()
    {
        return [];
    }
}
