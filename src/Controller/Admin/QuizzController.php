<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\QuizzType;
use App\Entity\Quizz;
use App\Repository\QuizzRepository;

/**
 * @Route("/admin/quizz")
 * @Template()
 */
class QuizzController extends AbstractController
{
    /**
     * @Route("/list", name="admin_quizz_list")
     */
    public function list(QuizzRepository $quizzRepository)
    {
        return [
            'quizzs' => $quizzRepository->findAll()
        ];
    }

    /**
     * @Route("/{id}/delete", name="admin_quizz_delete")
     */
    public function delete(Request $request, Quizz $quizz)
    {
        $plug = $request->query->get('plug');

        if($plug !== null or $plug === null and count($quizz->getQuestions()) < 5) {
            $this->removeQuizz($quizz);
            $message = "Le quizz - " . $quizz->getName() . " - a bien été supprimé";
        } else {
            $message = "- Vous devez supprimer le quizz à partir de sa fiche -";
        }

        $this->addFlash('notice', $message);

        return $this->redirectToRoute('admin_quizz_list');
    }

    /**
     * @Route("/{id}/update", name="admin_quizz_update")
     */
    public function update(Request $request, Quizz $quizz)
    {
        return $this->createOrUpdate($request, $quizz);
    }

    /**
     * @Route("/create", name="admin_quizz_create")
     */
    public function create(Request $request)
    {
        return $this->createOrUpdate($request, new Quizz());
    }

    private function removeQuizz(Quizz $quizz)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($quizz);
        $em->flush();
    }

    private function createOrUpdate(Request $request, Quizz $quizz)
    {
        $form = $this->createForm(QuizzType::class, $quizz);
        $form->add('save', SubmitType::class, [
            'attr' => ['class' => 'Sauvegarder'],
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($quizz);
            $em->flush();

            return $this->redirectToRoute('admin_quizz_list');
        }

        return $this->render('admin/quizz/createOrUpdate.html.twig', [
            'form' => $form->createView(),
            'quizz' => $quizz
        ]);
    }


}
