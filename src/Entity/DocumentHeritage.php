<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentHeritageRepository")
 */
class DocumentHeritage
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
    private $zone;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroFeuillet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomSite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type;

    /**
     * @ORM\Column(type="integer")
     */
    private $coordoneeX;

    /**
     * @ORM\Column(type="integer")
     */
    private $coordoneeY;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomFeuillet;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\File(
     *     maxSize = "500k",
     *     maxSizeMessage = "Ce fichier est volumineux !! veuillez le compressez !!"
     * )
     */
    private $fileName ;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getZone(): ?string
    {
        return $this->zone;
    }

    public function setZone(string $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getNomSite(): ?string
    {
        return $this->NomSite;
    }

    public function setNomSite(string $NomSite): self
    {
        $this->NomSite = $NomSite;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getCoordoneeX(): ?int
    {
        return $this->coordoneeX;
    }

    public function setCoordoneeX(int $coordoneeX): self
    {
        $this->coordoneeX = $coordoneeX;

        return $this;
    }

    public function getCoordoneeY(): ?int
    {
        return $this->coordoneeY;
    }

    public function setCoordoneeY(int $coordoneeY): self
    {
        $this->coordoneeY = $coordoneeY;

        return $this;
    }

    public function getNomFeuillet(): ?string
    {
        return $this->nomFeuillet;
    }

    public function setNomFeuillet(string $nomFeuillet): self
    {
        $this->nomFeuillet = $nomFeuillet;

        return $this;
    }

    public function getfileName()
    {
        return $this->fileName;
    }

    public function setfileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }
    
    public function getNumeroFeuillet(): ?int
    {
        return $this->numeroFeuillet;
    }

    public function setNumeroFeuillet(int $numeroFeuillet): self
    {
        $this->numeroFeuillet = $numeroFeuillet;

        return $this;
    }
}
