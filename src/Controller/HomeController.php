<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Repository\QuizzRepository;
use App\Entity\Quizz;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
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
     * @Template()
     */
    public function try(Quizz $quizz)
    {
        return [
            'quizz' => $quizz
        ];
    }

    /**
     * @Route("/quizz/submit", name="submit_quizz")
     * @Template()
     */
    public function submit(Request $request)
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
