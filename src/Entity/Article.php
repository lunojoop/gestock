<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $designation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $conditionnement;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock_initial;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock_actuel;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="articles")
     */
    private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity=Famille::class, inversedBy="articles")
     */
    private $famille;

    /**
     * @ORM\OneToMany(targetEntity=Entree::class, mappedBy="article")
     */
    private $entree;

    /**
     * @ORM\OneToMany(targetEntity=Sortie::class, mappedBy="article")
     */
    private $sortie;

    /**
     * @ORM\OneToMany(targetEntity=Retour::class, mappedBy="article")
     */
    private $retours;

    /**
     * @ORM\OneToMany(targetEntity=Inventaire::class, mappedBy="article")
     */
    private $inventaires;

    public function __construct()
    {
        $this->retours = new ArrayCollection();
        $this->inventaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getConditionnement(): ?string
    {
        return $this->conditionnement;
    }

    public function setConditionnement(string $conditionnement): self
    {
        $this->conditionnement = $conditionnement;

        return $this;
    }

    public function getStockInitial(): ?int
    {
        return $this->stock_initial;
    }

    public function setStockInitial(int $stock_initial): self
    {
        $this->stock_initial = $stock_initial;

        return $this;
    }

    public function getStockActuel(): ?int
    {
        return $this->stock_actuel;
    }

    public function setStockActuel(int $stock_actuel): self
    {
        $this->stock_actuel = $stock_actuel;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    

    
    
}
