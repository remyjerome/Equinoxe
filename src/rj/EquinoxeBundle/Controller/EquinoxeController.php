<?php

namespace rj\EquinoxeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use rj\EquinoxeBundle\Form\Type\ContactType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class EquinoxeController extends Controller
{
    public function indexAction()
    {
        return $this->render('rjEquinoxeBundle:Carousel:index.html.twig');
    }
    public function contactAction()
    {
    	$form = $this->get('form.factory')->create(new ContactType());
           // Get the request
        $request = $this->get('request');

        // Check the method
        if ($request->getMethod() == 'POST')
        {
            // Bind value with form
            $form->bind($request);

            $data = $form->getData();

            $message = \Swift_Message::newInstance()
                ->setContentType('text/html')
                ->setSubject($data['subject'])
                ->setFrom($data['email'])
                ->setTo('info@equinoxe-coaching.fr')
                ->setBody($data['content']);

            $this->get('mailer')->send($message);

            // Launch the message flash
            $this->get('session')->getFlashBag('notice', 'Merci de nous avoir contacté, nous répondrons à vos questions dans les plus brefs délais.');
        }
        return $this->render('rjEquinoxeBundle:Carousel:contact.html.twig', array('form' => $form->createView(),
        	));
    }
 }