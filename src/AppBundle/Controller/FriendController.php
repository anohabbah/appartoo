<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Marsupilami;
use AppBundle\Form\Type\MarsupilamiType;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class FriendController extends Controller
{
    /**
     * @Route("/friends", name="friends.index")
     */
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->createForm(MarsupilamiType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('fos_user_profile_show');
        }

        return $this->render('/Friend/index.html.twig', array(
            'user' => $user,
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/friends/{id}/show", methods={"GET"}, name="friends.show")
     */
    public function showAction($id)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $em = $this->getDoctrine()->getManager();
        $user = $em->find(Marsupilami::class, $id);
        return $this->render('/Friend/show.html.twig', array(
            'user' => $user
        ));
    }

    /**
     * @Route("/friends/{id}/remove", methods={"POST"}, name="friends.destroy")
     */
    public function removeAction($id)
    {
        /** @var Marsupilami $user */
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $em = $this->getDoctrine()->getManager();
        $friend = $em->find(Marsupilami::class, $id);
        $user->removeAmi($friend);
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('fos_user_profile_show');
    }

}
