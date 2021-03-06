<?php

/**
 * This file is part of project yeskn-studio/vmoex-framework.
 *
 * Author: Jake
 * Create: 2018-09-15 09:38:25
 */

namespace Yeskn\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Yeskn\MainBundle\Entity\Tag;
use Yeskn\MainBundle\Form\TagType;

/**
 * Class TagController
 * @package Yeskn\AdminBundle\Controller
 *
 * @Route("/tag")
 */
class TagController extends Controller
{
    /**
     * @Route("/", name="admin_tag_index")
     */
    public function indexAction()
    {
        /** @var Tag[] $list */
        $list = $this->getDoctrine()->getRepository('YesknMainBundle:Tag')->findAll();

        $form = $this->createForm(TagType::class, new Tag());

        return $this->render('@YesknAdmin/tag/index.html.twig', [
            'list' => $list,
            'form' => $form->createView()
        ]);
    }
}
