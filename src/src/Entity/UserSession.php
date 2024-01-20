<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="users_sessions")
 */
class UserSession
{
    /**
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\GeneratedValue(strategy="NONE") // No automatic generation of the ID
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $accessToken;

    // Other properties, getters, setters, and methods can be added as needed.

    /**
     * Get the user.
     *
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Set the user.
     *
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * Get the access token.
     *
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * Set the access token.
     *
     * @param string $accessToken
     */
    public function setAccessToken(string $accessToken): self
    {
        $hashedAccessToken = password_hash($accessToken, PASSWORD_BCRYPT);
        $this->accessToken = $hashedAccessToken;

        return $this;
    }
}
