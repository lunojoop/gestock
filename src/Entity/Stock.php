<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StockRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=StockRepository::class)
 */
class Stock
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $stockActuel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $StockInventaire;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="stock")
     */
    private $article;

    /**
     * @ORM\OneToMany(targetEntity=Entree::class, mappedBy="stock")
     */
    private $entree;

    /**
     * @ORM\OneToMany(targetEntity=Sortie::class, mappedBy="stock")
     */
    private $sortie;

    /**
     * @ORM\OneToMany(targetEntity=Retour::class, mappedBy="stock")
     */
    private $retour;

    /**
     * @ORM\OneToMany(targetEntity=Inventaire::class, mappedBy="stock")
     */
    private $inventaire;

    /**
     * @ORM\ManyToOne(targetEntity=Entrepot::class, inversedBy="stocks")
     */
    private $entrepot;

    public function __construct()
    {
        $this->entree = new ArrayCollection();
        $this->sortie = new ArrayCollection();
        $this->retour = new ArrayCollection();
        $this->inventaire = new ArrayCollection();
    }

    

   
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStockActuel(): ?int
    {
        return $this->stockActuel;
    }

    public function setStockActuel(int $stockActuel): self
    {
        $this->stockActuel = $stockActuel;

        return $this;
    }

    public function getStockInventaire(): ?int
    {
        return $this->StockInventaire;
    }

    public function setStockInventaire(?int $StockInventaire): self
    {
        $this->StockInventaire = $StockInventaire;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    /**
     * @return Collection|Entree[]
     */
    public function getEntree(): Collection
    {
        return $this->entree;
    }

    public function addEntree(Entree $entree): self
    {
        if (!$this->entree->contains($entree)) {
            $this->entree[] = $entree;
            $entree->setStock($this);
        }

        return $this;
    }

    public function removeEntree(Entree $entree): self
    {
        if ($this->entree->removeElement($entree)) {
            // set the owning side to null (unless already changed)
            if ($entree->getStock() === $this) {
                $entree->setStock(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Sortie[]
     */
    public function getSortie(): Collection
    {
        return $this->sortie;
    }

    public function addSortie(Sortie $sortie): self
    {
        if (!$this->sortie->contains($sortie)) {
            $this->sortie[] = $sortie;
            $sortie->setStock($this);
        }

        return $this;
    }

    public function removeSortie(Sortie $sortie): self
    {
        if ($this->sortie->removeElement($sortie)) {
            // set the owning side to null (unless already changed)
            if ($sortie->getStock() === $this) {
                $sortie->setStock(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Retour[]
     */
    public function getRetour(): Collection
    {
        return $this->retour;
    }

    public function addRetour(Retour $retour): self
    {
        if (!$this->retour->contains($retour)) {
            $this->retour[] = $retour;
            $retour->setStock($this);
        }

        return $this;
    }

    public function removeRetour(Retour $retour): self
    {
        if ($this->retour->removeElement($retour)) {
            // set the owning side to null (unless already changed)
            if ($retour->getStock() === $this) {
                $retour->setStock(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Inventaire[]
     */
    public function getInventaire(): Collection
    {
        return $this->inventaire;
    }

    public function addInventaire(Inventaire $inventaire): self
    {
        if (!$this->inventaire->contains($inventaire)) {
            $this->inventaire[] = $inventaire;
            $inventaire->setStock($this);
        }

        return $this;
    }

    public function removeInventaire(Inventaire $inventaire): self
    {
        if ($this->inventaire->removeElement($inventaire)) {
            // set the owning side to null (unless already changed)
            if ($inventaire->getStock() === $this) {
                $inventaire->setStock(null);
            }
        }

        return $this;
    }

    public function getEntrepot(): ?Entrepot
    {
        return $this->entrepot;
    }

    public function setEntrepot(?Entrepot $entrepot): self
    {
        $this->entrepot = $entrepot;

        return $this;
    }

    

    
}
