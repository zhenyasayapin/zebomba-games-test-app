<?php

namespace App\Entity;

class UserDto extends AbstractDto
{
    public string $id;
    public string $firstName;
    public string $lastName;
    public string $country;
    public string $city;
    public string $sig;
    public string $accessToken;
}