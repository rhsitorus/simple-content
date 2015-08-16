<?php

namespace Rofil\Simple\ContentBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Rofil\Simple\ContentBundle\Entity\NewsCategory;
use Rofil\Simple\ContentBundle\Form\NewsCategoryType;

/**
 * NewsCategory controller.
 *
 * @Route("/newscategory")
 */
class NewsCategoryController extends Controller
{

    /**
     * Lists all NewsCategory entities.
     *
     * @Route("/", name="newscategory")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RofilSimpleContentBundle:NewsCategory')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new NewsCategory entity.
     *
     * @Route("/", name="newscategory_create")
     * @Method("POST")
     * @Template("RofilSimpleContentBundle:NewsCategory:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new NewsCategory();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('newscategory_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a NewsCategory entity.
     *
     * @param NewsCategory $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NewsCategory $entity)
    {
        $form = $this->createForm(new NewsCategoryType(), $entity, array(
            'action' => $this->generateUrl('newscategory_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Simpan', 'attr' => array( 'class' => 'btn btn-primary' )));

        return $form;
    }

    /**
     * Displays a form to create a new NewsCategory entity.
     *
     * @Route("/new", name="newscategory_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new NewsCategory();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a NewsCategory entity.
     *
     * @Route("/{id}", name="newscategory_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RofilSimpleContentBundle:NewsCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NewsCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing NewsCategory entity.
     *
     * @Route("/{id}/edit", name="newscategory_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RofilSimpleContentBundle:NewsCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NewsCategory entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a NewsCategory entity.
    *
    * @param NewsCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NewsCategory $entity)
    {
        $form = $this->createForm(new NewsCategoryType(), $entity, array(
            'action' => $this->generateUrl('newscategory_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update', 'attr' => array( 'class' => 'btn btn-primary' )));

        return $form;
    }
    /**
     * Edits an existing NewsCategory entity.
     *
     * @Route("/{id}", name="newscategory_update")
     * @Method("PUT")
     * @Template("RofilSimpleContentBundle:NewsCategory:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RofilSimpleContentBundle:NewsCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NewsCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('newscategory_show', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a NewsCategory entity.
     *
     * @Route("/{id}", name="newscategory_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RofilSimpleContentBundle:NewsCategory')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NewsCategory entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('newscategory'));
    }

    /**
     * Creates a form to delete a NewsCategory entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('newscategory_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Hapus', 'attr' => [ 'class' => 'btn btn-danger']))
            ->getForm()
        ;
    }
}
