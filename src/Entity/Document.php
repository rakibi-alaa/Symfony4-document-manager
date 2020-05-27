<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentRepository")
 */
class Document
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=10,minMessage="Votre Titre de document doit faire minimum 10 caractères")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5,minMessage="Votre domaine doit faire minimum 5 caractères")
     */
    private $domainEtude;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5,minMessage="Votre Titre de document doit faire minimum 5 caractères")
     */
    private $autheurIndividue;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5,minMessage="Votre Titre de document doit faire minimum 5 caractères")
     */
    private $autheurCompanie;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $numeroFeuillet;

    /**
     * @ORM\Column(type="date")
     */
    private $datePublication;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeDocument;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomFeuillet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $domaineLithosctructural;

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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDomainEtude(): ?string
    {
        return $this->domainEtude;
    }

    public function setDomainEtude(string $domainEtude): self
    {
        $this->domainEtude = $domainEtude;

        return $this;
    }

    public function getAutheurIndividue(): ?string
    {
        return $this->autheurIndividue;
    }

    public function setAutheurIndividue(string $autheurIndividue): self
    {
        $this->autheurIndividue = $autheurIndividue;

        return $this;
    }

    public function getAutheurCompanie(): ?string
    {
        return $this->autheurCompanie;
    }

    public function setAutheurCompanie(string $autheurCompanie): self
    {
        $this->autheurCompanie = $autheurCompanie;

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

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(\DateTimeInterface $datePublication): self
    {
        $this->datePublication = $datePublication;

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

    
    /********************* */
    public function getTypeDocument(): ?string
    {
        return $this->typeDocument;
    }

    public function setTypeDocument(string $typeDocument): self
    {
        $this->typeDocument = $typeDocument;

        return $this;
    }
    /************** */
    public function getNomFeuillet(): ?string
    {
        return $this->nomFeuillet;
    }

    public function setNomFeuillet(string $nomFeuillet): self
    {
        $this->nomFeuillet = $nomFeuillet;

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

    public function getDomaineLithosctructural(): ?string
    {
        return $this->domaineLithosctructural;
    }

    public function setDomaineLithosctructural(string $domaineLithosctructural): self
    {
        $this->domaineLithosctructural = $domaineLithosctructural;

        return $this;
    }
}
