<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Rando;
use AppBundle\Form\RandoType;

/**
 * Rando controller.
 *
 */
class RandoController extends Controller
{
    /**
     * Lists all Rando entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $randos = $em->getRepository('AppBundle:Rando')->findAll();

        return $this->render('AppBundle:rando:index.html.twig', array(
            'randos' => $randos,
        ));
    }

    /**
     * Creates a new Rando entity.
     *
     */
    public function newAction(Request $request)
    {
        $rando = new Rando();
        $form = $this->createForm('AppBundle\Form\RandoType', $rando);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rando);
            $em->flush();

            return $this->redirectToRoute('rando_show', array('id' => $rando->getId()));
        }

        return $this->render('AppBundle:rando:new.html.twig', array(
            'rando' => $rando,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Rando entity.
     *
     */
    public function showAction(Rando $rando)
    {
        $deleteForm = $this->createDeleteForm($rando);

        return $this->render('AppBundle:rando:show.html.twig', array(
            'rando' => $rando,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Rando entity.
     *
     */
    public function editAction(Request $request, Rando $rando)
    {
        $deleteForm = $this->createDeleteForm($rando);
        $editForm = $this->createForm('AppBundle\Form\RandoType', $rando);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rando);
            $em->flush();

            return $this->redirectToRoute('rando_edit', array('id' => $rando->getId()));
        }

        return $this->render('AppBundle:rando:edit.html.twig', array(
            'rando' => $rando,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Rando entity.
     *
     */
    public function deleteAction(Request $request, Rando $rando)
    {
        $form = $this->createDeleteForm($rando);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rando);
            $em->flush();
        }

        return $this->redirectToRoute('rando_index');
    }

    /**
     * Creates a form to delete a Rando entity.
     *
     * @param Rando $rando The Rando entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Rando $rando)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rando_delete', array('id' => $rando->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
