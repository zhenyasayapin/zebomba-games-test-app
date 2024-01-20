<?php

namespace App\Service;

use App\Entity\UserDto;
use App\Event\UserAuthenticationEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class SecurityService
{
    private string $securitySecret;
    private CommonService $commonService;

    private EventDispatcherInterface $eventDispatcher;

    public function __construct(
        $securitySecret,
        CommonService $commonService,
        EventDispatcherInterface $eventDispatcher
    )
    {
        $this->securitySecret = $securitySecret;
        $this->commonService = $commonService;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function authenticateUser(UserDto $userDto)
    {
        $params = $userDto->toArray();
        $params = $this->commonService->convertArrayKeysCamelToSnake($params);
        
        ksort($params);
        unset($params["sig"]);

        $string = '';
        foreach ($params as $prop => $value) {
            $string .= "$prop=$value";
        }
        $string .= $this->securitySecret;

        $string = mb_strtolower(md5($string), 'UTF-8');

        if ($string === $userDto->sig) {
            $event = new UserAuthenticationEvent($userDto);
            $this->eventDispatcher->dispatch($event, 'user.authentication');        
        } else {
            throw new \Exception("Authenticate failed");
        }

        unset($params["access_token"]);

        return [
            "access_token" => $userDto->accessToken,
            "user_info" => $params,
            "error" => "",
            "error_key" => ""
        ];
    }
    
    public function getAuthenticationError()
    {
        return [
            "error" => "Ошибка авторизации в приложении",
            "error_key" => "signature error"
        ];
    }
}