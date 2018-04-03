<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Response\Render;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @Render(allow={"id":"getId","username":"getUsername"});
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    public function getId()
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
}
