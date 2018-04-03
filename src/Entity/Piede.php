<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Response\Render;

/**
 * @ORM\Entity()
 * @Render(allow={"id":"getId","stringa":"getStringa","numero":"getNumero"});
 */
class Piede
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
    private $stringa;

    /**
     * @ORM\Column(type="integer", length=255)
     */
    private $numero;

    public function getId()
    {
        return $this->id;
    }

    public function getStringa(): ?string
    {
        return $this->stringa;
    }

    public function setStringa(string $stringa): self
    {
        $this->stringa = $stringa;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }
}
