<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EntreeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=EntreeRepository::class)
 */
class Entree
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
    private $numeroBC;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixUnitaireHT;

    /**
     * @ORM\Column(type="integer")
     */
    private $montantHT;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="entree")
     */
    private $article;

    public function __construct()
    {
        $this->article = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroBC(): ?string
    {
        return $this->numeroBC;
    }

    public function setNumeroBC(string $numeroBC): self
    {
        $this->numeroBC = $numeroBC;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixUnitaireHT(): ?int
    {
        return $this->prixUnitaireHT;
    }

    public function setPrixUnitaireHT(int $prixUnitaireHT): self
    {
        $this->prixUnitaireHT = $prixUnitaireHT;

        return $this;
    }

    public function getMontantHT(): ?int
    {
        return $this->montantHT;
    }

    public function setMontantHT(int $montantHT): self
    {
        $this->montantHT = $montantHT;

        return $this;
    }

   
}
