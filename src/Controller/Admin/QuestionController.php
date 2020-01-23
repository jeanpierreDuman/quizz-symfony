<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\QuizzType;
use App\Form\QuestionType;
use App\Entity\Category;
use App\Entity\Quizz;
use App\Entity\Question;
use App\Entity\Answer;
use App\Repository\QuizzRepository;
use App\Repository\QuestionRepository;
use App\Controller\Admin\AdminAbstractController;

/**
 * @Route("/admin")
 * @Template()
 */
class QuestionController extends AdminAbstractController
{
  /**
   * @Route("/quizz/{id}/questions/get", name="admin_questions_get")
   */
   public function getQuestionData(Quizz $quizz, QuestionRepository $questionRepository)
   {
      $questions = $questionRepository->findByQuizz($quizz);

      return ['questions' => $questions];
   }

    /**
     * @Route("/quizz/{id}/question/manage", name="admin_quizz_settings")
     */
     public function manage(Request $request, Quizz $quizz)
     {
       $question = new Question();
       $form = $this->createForm(QuestionType::class, $question);
       $form->add('save', SubmitType::class, [
           'label' => "create question",
       ]);
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {
           $em = $this->getDoctrine()->getManager();
           $question->setQuizz($quizz);
           $em->persist($question);
           $em->flush();

           return $this->render('admin/question/get_one_question_data.html.twig', [
              'question' => $question
           ]);
       }

        return [
            'quizz' => $quizz,
            'form' => $form->createView()
        ];
     }

    /**
     * @Route("/question/{id}/delete", name="admin_question_delete")
     * @Template()
     */
    public function delete(Request $request, Question $question)
    {
        if($this->deleteEntity($request, $question)) {
            return $this->redirectToRoute('admin_quizz_settings', [
                'id' => $question->getQuizz()->getId()
            ]);
        }

        return [
            'question' => $question
        ];
    }
}
