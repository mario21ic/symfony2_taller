<?php

namespace Blog\BlogBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blog\BlogBundle\Entity\Blog;
use Blog\BlogBundle\Form\BlogType;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BlogBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function blogAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $blogs = $em->getRepository('BlogBundle:Blog')->findAll();
        return $this->render('BlogBundle:Default:lista.html.twig', array(
            'blogs' => $blogs,
        ));
    }

    public function nuevoAction()
    {
    	$blog = new Blog();
    	$form = $this->createForm(new BlogType(), $blog);
    	
    	$request = $this->getRequest();
    	if ($request->getMethod() == 'POST') {
    		$form->bindRequest($request);
    
    		if ($form->isValid()) {
    			$em = $this->getDoctrine()->getEntityManager();
    			$em->persist($blog);
    			$em->flush();
    			
    			return $this->redirect($this->generateUrl('blog_lista'));
    		}
    	}
    
        return $this->render('BlogBundle:Default:nuevo.html.twig', array('form' => $form->createView()));
    }

    public function editarAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $blog = $em->getRepository('BlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('No existe blog con id: ' . $id);
        }

        $form = $this->createForm(new BlogType(), $blog);
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($blog);
                $em->flush();
                return $this->redirect($this->generateUrl('blog_lista'));
            }
        }

        return $this->render('BlogBundle:Default:editar.html.twig', array(
            'blog' => $blog,
            'form' => $form->createView()
        ));
    }

    public function eliminarAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $blog = $em->getRepository('BlogBundle:Blog')->find($id);
        $em->remove($blog);
        $em->flush();

        return $this->redirect($this->generateUrl('blog_lista'));
    }
}
