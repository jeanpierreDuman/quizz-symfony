<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\QuizzType;
use App\Form\QuestionType;
use App\Entity\Category;
use App\Entity\Quizz;
use App\Entity\Question;
use App\Entity\Answer;
use App\Repository\QuizzRepository;

/**
 * @Route("/admin")
 * @Template()
 */
class QuizzController extends AbstractController
{
    /**
     * @Route("/quizz/create", name="admin_quizz_create")
     */
    public function create(Request $request, QuizzRepository $quizzRepository)
    {
        $quizz = new Quizz();
        $form = $this->createForm(QuizzType::class, $quizz);
        $form->add('save', SubmitType::class, [
            'attr' => ['class' => 'save'],
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $quizz->setActive(False);
            $em->persist($quizz);
            $em->flush();

            return $this->redirectToRoute('admin_quizz_settings', [
                'id' => $quizz->getId()
            ]);
        }

        return [
            'form' => $form->createView(),
            'quizzs' => $quizzRepository->findAll()
        ];
    }

     /**
      * @Route("/quizz/{id}/settings/question/{question}", name="admin_quizz_settings_question")
      */
      public function settingsQuestion(Quizz $quizz, Question $question)
      {
         return [
             'question' => $question
         ];
      }
}
