<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Repository\QuizzRepository;
use App\Entity\Quizz;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @IsGranted("ROLE_USER")
     * @Template()
     */
    public function index(QuizzRepository $quizzRepository)
    {
        return [
            'quizzs' => $quizzRepository->findAll()
        ];
    }

    /**
     * @Route("/quizz/{id}/try", name="quizz_try")
     * @IsGranted("ROLE_USER")
     * @Template()
     */
    public function try(Quizz $quizz)
    {
        return [
            'quizz' => $quizz
        ];
    }

    /**
     * @Route("/quizz/result", name="submit_result")
     * @IsGranted("ROLE_USER")
     * @Template()
     */
    public function result(Request $request)
    {
        $replies = $request->request->all();
        $points = 0;

        foreach($replies as $reply) {
            if($reply === "1") {
                $points++;
            }
        }

        return [
            'points' => $points
        ];
    }
}
