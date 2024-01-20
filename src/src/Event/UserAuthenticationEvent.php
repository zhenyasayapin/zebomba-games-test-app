<?php

namespace App\Event;

use App\Entity\UserDto;
use Symfony\Contracts\EventDispatcher\Event;

class UserAuthenticationEvent extends Event
{
    private UserDto $userDto;

    public function __construct(UserDto $userDto)
    {
        $this->userDto = $userDto;
    }
    
    /**
     * Get the value of userDto
     */ 
    public function getUserDto()
    {
        return $this->userDto;
    }
}
