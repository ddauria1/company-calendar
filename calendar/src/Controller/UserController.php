<?php
namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserController extends Controller
{
    /**
     * @Route("/" , name="login")
     *
     */
    public function login(Request $request, LoggerInterface $logger){
        $logger->info("We are loading the login page");

        $user = new User();

        $form = $this->createFormBuilder($user)
            ->add('email', TextType::class)
            ->add('password', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Login'))
            ->getForm();


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            /*
             * Check if user's exists if yes grant login otherwise return the login page with an error message
             * displayed
            */

            return $this->redirectToRoute('task_success');
        }


        return $this->render('login.html.twig',
            array(
                'title' => 'Company Calendar',
                'form' => $form->createView()
            )
        );
    }
}