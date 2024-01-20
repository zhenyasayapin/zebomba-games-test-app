<?php

namespace App\Service;

use App\Entity\UserDto;
use App\Entity\UserSession;
use App\Repository\UserRepository;
use App\Repository\UserSessionRepository;

class UserSessionService
{
    private UserSessionRepository $userSessionRepository;
    private UserRepository $userRepository;

    public function __construct(
        UserSessionRepository $userSessionRepository,
        UserRepository $userRepository
    ) {
        $this->userSessionRepository = $userSessionRepository;
        $this->userRepository = $userRepository;
    }

    public function createOrUpdate(UserDto $userDto)
    {
        $user = $this->userRepository->find($userDto->id);
        $userSession = $this->userSessionRepository->find($user->getId());

        if (!$userSession) {
            $userSession = new UserSession();
        }

        $userSession->setUser($user);
        $userSession->setAccessToken($userDto->accessToken);

        $this->userSessionRepository->add($userSession, true);

        return $userSession;
    }
}