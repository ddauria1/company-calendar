<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\LoginForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

class UserController extends Controller
{
    /**
     * @Route("/" , name="login")
     *
     */
    public function login(Request $request, LoggerInterface $logger){
        $logger->info("We are loading the login page");

        $user = new User();

        $form = $this->createForm(LoginForm::class,$user);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            var_dump($user);exit;

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