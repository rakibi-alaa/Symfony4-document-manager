<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RessourcesMineralesRepository")
 */
class RessourcesMinerales
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etape;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typologie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $elementChimique;

    /**
     * @ORM\Column(type="integer")
     */
    private $teneur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lithologie;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\File(
     *     maxSize = "500k",
     *     maxSizeMessage = "Ce fichier est volumineux !! veuillez le compressez !!"
     * )
     */
    private $fileName ;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomFeuillet;

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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEtape(): ?string
    {
        return $this->etape;
    }

    public function setEtape(string $etape): self
    {
        $this->etape = $etape;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getTypologie(): ?string
    {
        return $this->typologie;
    }

    public function setTypologie(string $typologie): self
    {
        $this->typologie = $typologie;

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

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

    public function getTeneur(): ?int
    {
        return $this->teneur;
    }

    public function setTeneur(int $teneur): self
    {
        $this->teneur = $teneur;

        return $this;
    }

    public function getLithologie(): ?string
    {
        return $this->lithologie;
    }

    public function setLithologie(string $lithologie): self
    {
        $this->lithologie = $lithologie;

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

    public function getNomFeuillet(): ?string
    {
        return $this->nomFeuillet;
    }

    public function setNomFeuillet(string $nomFeuillet): self
    {
        $this->nomFeuillet = $nomFeuillet;

        return $this;
    }

    public function anneee(){
        $array = [];
        $year = date("Y");
        for ($i=1900; $i <= intval($year); $i++) { 
            array_push($array,$i);
        }

        return $array;
    }
}
