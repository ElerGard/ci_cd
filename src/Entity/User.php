<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public static function ensureIsValidUser(string $log, string $pass): bool
    {
        if ($log == "" || strlen($log) < 3 )
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid login',
                    $log
                )
            );
        if ($pass == "" || strlen($pass) < 3)
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid password',
                    $pass
                )
            );
        return true;
    }
}
