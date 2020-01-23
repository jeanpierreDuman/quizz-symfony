<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CategoryType;
use App\Entity\Category;

/**
 * @Route("/admin")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/category/create", name="admin_category_create")
     * @Template()
     */
    public function create(Request $request)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->add('save', SubmitType::class, [
            'attr' => ['class' => 'save'],
        ]);
        $form->handleRequest($request);
aefafeafe
    }
}
