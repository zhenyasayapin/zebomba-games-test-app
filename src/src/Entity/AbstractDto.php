<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\Request;

abstract class AbstractDto
{
    public function toArray()
    {
        return (array) $this;
    }

    public static function createFromRequest(Request $request)
    {
        $userParams = $request->query->all();
        
        $dto = new UserDto();

        $dto->id = $userParams['id'];
        $dto->city = $userParams['city'];
        $dto->country = $userParams['country'];
        $dto->firstName = $userParams['first_name'];
        $dto->lastName = $userParams['last_name'];
        $dto->sig = $userParams['sig'];
        $dto->accessToken = $userParams['access_token'];

        return $dto;
    }
}