<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\UserDto;
use App\Service\SecurityService;
use Throwable;

class SecurityController extends AbstractController
{
    /**
     * @Route("/user_auth", name="user_auth")
     */
    public function authenticateUser(Request $request, SecurityService $securityService): JsonResponse
    {
        try {
            $userDto = UserDto::createFromRequest($request);

            return new JsonResponse($securityService->authenticateUser($userDto));
        } catch (Throwable $e) {
            
            return new JsonResponse($securityService->getAuthenticationError());
        }
    }
}
