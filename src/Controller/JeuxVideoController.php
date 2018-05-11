<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JeuxVideoController extends Controller
{
    /**
     * @Route("/jeux/video", name="jeux_video")
     */
    public function index()
    {
        return $this->render('jeux_video/index.html.twig', [
            'controller_name' => 'JeuxVideoController',
        ]);
    }
}
