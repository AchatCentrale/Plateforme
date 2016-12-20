<?php
namespace AchatCentrale\CrmBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View; // Utilisation de la vue de FOSRestBundle
use AchatCentrale\CrmBundle\Entity\Users;


class UserController extends Controller
{


    /**
     * @Rest\View()
     * @Rest\Get("/users/")
     */
    public function getUsersAction(Request $request)
    {
        $users = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AchatCentraleCrmBundle:Users')
            ->findAll();


        return $users;



    }


    /**
     * @Rest\View()
     * @Rest\Get("/users/{id}")
     */
    public function getUserAction($id,Request $request)
    {
        $user = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AchatCentraleCrmBundle:Users')
            ->find($id);




        if (empty($user)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }

        return $user;
    }



    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/users")
     */
    public function postUserAction(Request $request)
    {
        $user = new Users();

        $user->setUsPrenom("test_jb")
             ->setUsNom("test")
            ->setUsMail("Jbagostin@gmail.com");


        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($user);
        $em->flush();



       return $user;



    }


    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/users/{id}")
     */
    public function removeUserAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $user = $em->getRepository('AchatCentraleCrmBundle:Users')

            ->find($request->get('id'));

        if ($user) {
            $em->remove($user);
            $em->flush();
        }
    }




}
