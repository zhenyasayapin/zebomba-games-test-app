<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\UserDto;
use App\Repository\UserRepository;

class UserService 
{
    private UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function createOrUpdate(UserDto $userDto)
    {
        $user = $this->userRepository->find($userDto->id);

        if (!$user) {
            $user = new User();
        }

        $user->setId($userDto->id);
        $user->setCountry($userDto->country);
        $user->setCity($userDto->city);
        $user->setFirstName($userDto->firstName);
        $user->setLastName($userDto->lastName);

        $this->userRepository->add($user, true);

        return $user;
    }
}