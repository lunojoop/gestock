<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EntrepotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * itemOperations={"put","get"},
 * attributes={"access_control"="is_granted('ROLE_ADMIN')"}, )
 * @ORM\Entity(repositoryClass=EntrepotRepository::class)
 */
class Entrepot
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
    private $libelle;

   
    /**
     * @ORM\OneToMany(targetEntity=Retour::class, mappedBy="entrepot")
     */
    private $retour;

    /**
     * @ORM\OneToMany(targetEntity=Entree::class, mappedBy="entrepot")
     */
    private $entree;

    /**
     * @ORM\OneToMany(targetEntity=Sortie::class, mappedBy="entrepot")
     */
    private $sortie;

    /**
     * @ORM\OneToMany(targetEntity=Inventaire::class, mappedBy="entrepot")
     */
    private $inventaire;

    /**
     * @ORM\OneToMany(targetEntity=Stock::class, mappedBy="entrepot")
     */
    private $stocks;

    

    public function __construct()
    {
        $this->retour = new ArrayCollection();
        $this->entree = new ArrayCollection();
        $this->sortie = new ArrayCollection();
        $this->inventaire = new ArrayCollection();
        $this->stocks = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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
            $retour->setEntrepot($this);
        }

        return $this;
    }

    public function removeRetour(Retour $retour): self
    {
        if ($this->retour->removeElement($retour)) {
            // set the owning side to null (unless already changed)
            if ($retour->getEntrepot() === $this) {
                $retour->setEntrepot(null);
            }
        }

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
            $entree->setEntrepot($this);
        }

        return $this;
    }

    public function removeEntree(Entree $entree): self
    {
        if ($this->entree->removeElement($entree)) {
            // set the owning side to null (unless already changed)
            if ($entree->getEntrepot() === $this) {
                $entree->setEntrepot(null);
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
            $sortie->setEntrepot($this);
        }

        return $this;
    }

    public function removeSortie(Sortie $sortie): self
    {
        if ($this->sortie->removeElement($sortie)) {
            // set the owning side to null (unless already changed)
            if ($sortie->getEntrepot() === $this) {
                $sortie->setEntrepot(null);
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
            $inventaire->setEntrepot($this);
        }

        return $this;
    }

    public function removeInventaire(Inventaire $inventaire): self
    {
        if ($this->inventaire->removeElement($inventaire)) {
            // set the owning side to null (unless already changed)
            if ($inventaire->getEntrepot() === $this) {
                $inventaire->setEntrepot(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Stock[]
     */
    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    public function addStock(Stock $stock): self
    {
        if (!$this->stocks->contains($stock)) {
            $this->stocks[] = $stock;
            $stock->setEntrepot($this);
        }

        return $this;
    }

    public function removeStock(Stock $stock): self
    {
        if ($this->stocks->removeElement($stock)) {
            // set the owning side to null (unless already changed)
            if ($stock->getEntrepot() === $this) {
                $stock->setEntrepot(null);
            }
        }

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

    
}
