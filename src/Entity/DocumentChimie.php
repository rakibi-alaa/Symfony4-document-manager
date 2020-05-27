<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentChimieRepository")
 */
class DocumentChimie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroFeuillet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identifiant;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(max=25,minMessage="Error")
     */
    private $coordonneX;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(max=25,minMessage="Error")
     */
    private $coordonneY;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $objetAnalyse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mineralAnalyse;

    /**
     * @ORM\Column(type="integer")
     */
    private $teneur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $methodeAnalyse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomRoche;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $elementChimique;

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

    public function getNumeroFeuillet(): ?int
    {
        return $this->numeroFeuillet;
    }

    public function setNumeroFeuillet(int $numeroFeuillet): self
    {
        $this->numeroFeuillet = $numeroFeuillet;

        return $this;
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

    public function getObjetAnalyse(): ?string
    {
        return $this->objetAnalyse;
    }

    public function setObjetAnalyse(string $objetAnalyse): self
    {
        $this->objetAnalyse = $objetAnalyse;

        return $this;
    }

    public function getMineralAnalyse(): ?string
    {
        return $this->mineralAnalyse;
    }

    public function setMineralAnalyse(string $mineralAnalyse): self
    {
        $this->mineralAnalyse = $mineralAnalyse;

        return $this;
    }

    public function getTeneur(): ?int
    {
        return $this->teneur;
    }

    public function setTeneur(int $teneur): self
    {
        $this->teneur = $teneur;

        return $this;
    }

    public function getMethodeAnalyse(): ?string
    {
        return $this->methodeAnalyse;
    }

    public function setMethodeAnalyse(string $methodeAnalyse): self
    {
        $this->methodeAnalyse = $methodeAnalyse;

        return $this;
    }

    public function getNomRoche(): ?string
    {
        return $this->NomRoche;
    }

    public function setNomRoche(string $NomRoche): self
    {
        $this->NomRoche = $NomRoche;

        return $this;
    }

    public function getElementChimique(): ?string
    {
        return $this->elementChimique;
    }

    public function setElementChimique(string $elementChimique): self
    {
        $this->elementChimique = $elementChimique;

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
