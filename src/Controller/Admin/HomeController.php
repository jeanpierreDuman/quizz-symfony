<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/admin")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="admin_home")
     * @Template()
     */
    public function index()
    {
        return [];
    }
}
