<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentChronoRepository")
 */
class DocumentChrono
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
    private $identifiant;

    /**
     * @ORM\Column(type="integer")
     */
    private $coordonneX;

    /**
     * @ORM\Column(type="integer")
     */
    private $coordonneY;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $systemeIsoptique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $materialAnalyse;

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

    public function getNumeroFeuillet(): ?int
    {
        return $this->numeroFeuillet;
    }

    public function setNumeroFeuillet(int $numeroFeuillet): self
    {
        $this->numeroFeuillet = $numeroFeuillet;

        return $this;
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function setIdentifiant(string $identifiant): self
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    public function getCoordonneX(): ?int
    {
        return $this->coordonneX;
    }

    public function setCoordonneX(int $coordonneX): self
    {
        $this->coordonneX = $coordonneX;

        return $this;
    }

    public function getCoordonneY(): ?int
    {
        return $this->coordonneY;
    }

    public function setCoordonneY(int $coordonneY): self
    {
        $this->coordonneY = $coordonneY;

        return $this;
    }

    public function getSystemeIsoptique(): ?string
    {
        return $this->systemeIsoptique;
    }

    public function setSystemeIsoptique(string $systemeIsoptique): self
    {
        $this->systemeIsoptique = $systemeIsoptique;

        return $this;
    }

    public function getMaterialAnalyse(): ?string
    {
        return $this->materialAnalyse;
    }

    public function setMaterialAnalyse(string $materialAnalyse): self
    {
        $this->materialAnalyse = $materialAnalyse;

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
}
