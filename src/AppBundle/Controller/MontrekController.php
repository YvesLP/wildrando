<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Montrek;
use AppBundle\Form\MontrekType;

/**
 * Montrek controller.
 *
 */
class MontrekController extends Controller
{
    /**
     * Lists all Montrek entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $montreks = $em->getRepository('AppBundle:Montrek')->findAll();

        return $this->render('AppBundle:montrek:index.html.twig', array(
            'montreks' => $montreks,
        ));
    }

    /**
     * Creates a new Montrek entity.
     *
     */
    public function newAction(Request $request)
    {
        $montrek = new Montrek();
        $form = $this->createForm('AppBundle\Form\MontrekType', $montrek);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($montrek);
            $em->flush();

            return $this->redirectToRoute('montrek_show', array('id' => $montrek->getId()));
        }

        return $this->render('AppBundle:montrek:new.html.twig', array(
            'montrek' => $montrek,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Montrek entity.
     *
     */
    public function showAction(Montrek $montrek)
    {
        $deleteForm = $this->createDeleteForm($montrek);

        return $this->render('AppBundle:montrek:show.html.twig', array(
            'montrek' => $montrek,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Montrek entity.
     *
     */
    public function editAction(Request $request, Montrek $montrek)
    {
        $deleteForm = $this->createDeleteForm($montrek);
        $editForm = $this->createForm('AppBundle\Form\MontrekType', $montrek);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($montrek);
            $em->flush();

            return $this->redirectToRoute('montrek_edit', array('id' => $montrek->getId()));
        }

        return $this->render('AppBundle:montrek:edit.html.twig', array(
            'montrek' => $montrek,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Montrek entity.
     *
     */
    public function deleteAction(Request $request, Montrek $montrek)
    {
        $form = $this->createDeleteForm($montrek);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($montrek);
            $em->flush();
        }

        return $this->redirectToRoute('montrek_index');
    }

    /**
     * Creates a form to delete a Montrek entity.
     *
     * @param Montrek $montrek The Montrek entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Montrek $montrek)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('montrek_delete', array('id' => $montrek->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
