<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;


class MainController extends Controller {
    /**
     * @Route("/" , name="home-page")
     *
     */
    public function homepage(Request $request, LoggerInterface $logger){
        $logger->info("We are logging the homepage");
        $content = "HOME";

        return $this->render('home.html.twig',
            array(
                'title' => 'README.md',
                'mainContent' => $content
            )
        );
    }

}