<?php

namespace App\EventListener;

use App\Event\MyEvent;
use App\Event\UserAuthenticationEvent;
use App\Service\UserService;
use App\Service\UserSessionService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserAuthenticationListener implements EventSubscriberInterface
{
    private UserSessionService $userSessionService;
    private UserService $userService;

    public function __construct(
        UserService $userService,
        UserSessionService $userSessionService
    )
    {
        $this->userService = $userService;
        $this->userSessionService = $userSessionService;
    }
    public static function getSubscribedEvents()
    {
        return [
            'user.authentication' => 'onUserAuthentication',
        ];
    }

    public function onUserAuthentication(UserAuthenticationEvent $event)
    {
        $this->userService->createOrUpdate($event->getUserDto());
        $this->userSessionService->createOrUpdate($event->getUserDto());
    }
}
