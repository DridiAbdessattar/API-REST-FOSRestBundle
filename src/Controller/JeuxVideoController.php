<?php

namespace App\Controller;

use App\Entity\JeuxVideo;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Validator\ConstraintViolationList;


class JeuxVideoController extends FOSRestController
{

    /**
     * @Rest\Get("/jeux/videos", name="app_jeux_list")
     * @View
     */

    public function listAction()

    {
        $jeuxVideos = $this->getDoctrine()
            ->getRepository(JeuxVideo::class)
            ->findAll();

        return $jeuxVideos;

    }

    /**
     * @Get(
     *     path = "/jeux/video/{uid}",
     *     name = "app_jeux_show",
     *     requirements = {"uid"="\d+"}
     * )
     * @View
     */

    public function showAction( JeuxVideo $JeuxVideo)

    {

        return $JeuxVideo;

    }

    /**
     * @Rest\Post(
     *    path = "/jeux/videos",
     *    name = "app_jeux_create"
     * )
     * @Rest\View(StatusCode = 201)
     * @ParamConverter("JeuxVideo", converter="fos_rest.request_body")
     */

    public function createAction(JeuxVideo $JeuxVideo,ConstraintViolationList $violations)

    {
        if (count($violations)) {

            return $this->view($violations, Response::HTTP_BAD_REQUEST);

        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($JeuxVideo);
        $em->flush();

       return $this->view
       ($JeuxVideo, Response::HTTP_CREATED, ['Location' => $this->generateUrl('app_jeux_show', ['uid' => $JeuxVideo->getUid(), UrlGeneratorInterface::ABSOLUTE_URL])]);
    }



}
