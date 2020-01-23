<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AdminAbstractController extends AbstractController
{
    public function deleteEntity(Request $request, $entity)
    {
        if($request->getMethod() === 'DELETE' && $this->isCsrfTokenValid('delete'. $entity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entity);
            $entityManager->flush();

            return true;
        }

        return false;
    }
}
