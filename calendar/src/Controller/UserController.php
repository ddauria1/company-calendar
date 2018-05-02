<?php
namespace App\Controller;

use \Datetime;
use App\Entity\User;
use App\Form\LoginForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class UserController extends Controller
{
    /**
     * @Route("/" , name="login")
     *
     */
    public function login(Request $request, LoggerInterface $logger){

        $session = $request->getSession();

        if($session->get('User')!=null){
            return $this->redirect("/admin/");
        }

        $logger->info("We are loading the login page");

        $user = new User();

        $form = $this->createForm(LoginForm::class,$user);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //reset session
            $session->remove("User");

            $user = $form->getData();
            $userExist = null;

            /*
             * Check if user's exists if yes grant login otherwise return the login page with an error message
             * displayed
            */

            $userRepository = $this->getDoctrine()->getRepository(User::class);

            $userExist = $userRepository->findOneBy([
                'email' => $user->getEmail(),
                'password' => $user->getPassword()
            ]);

            if (!$userExist) {
                return $this->render('login.html.twig',
                    [
                        'title' => 'Company Calendar',
                        'form' => $form->createView(),
                        'error' => 'Invalid usersname/password'

                    ]
                );
            }else {

                //define session
                $session->set('User', $userExist);
                return $this->redirect("/admin/");
            }
        }

        return $this->render('login.html.twig',
            [
                'title' => 'Company Calendar',
                'form' => $form->createView(),
                'error' => ''

            ]
        );

    }


    /**
     * @Route("/logout" , name="logout")
     *
     */
    public function logout(Request $request){

        $session = $request->getSession();
        $session->remove("User");

        return $this->redirect("/","302");

    }


    /**
     * @Route("/" , name="insertUser")
     *
     */
    public function insert(Request $request, LoggerInterface $logger){
        $logger->info("Inserting a new user");

        $user = new User();

        $form = $this->createForm(LoginForm::class,$user);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            //var_dump($user);exit;

            $user->setFirstname("A");
            $user->setSurname("B");
            $user->setCreatedBy(1);
            $user->setCreatedDate(new DateTime(date("Y-m-d H:i:s")));
            $user->setUpdatedBy(1);
            $user->setUpdatedDate(new DateTime(date("Y-m-d H:i:s")));
            $user->setType(1);

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($user);
            $entityManager->flush();

            /*
             * Check if user's exists if yes grant login otherwise return the login page with an error message
             * displayed
            */


            return $this->render('/admin/index.html.twig',
                [
                    'title' => 'Company Calendar'
                ]
            );
        }


        return $this->render('login.html.twig',
            [
                'title' => 'Company Calendar',
                'form' => $form->createView()
            ]
        );
    }
}