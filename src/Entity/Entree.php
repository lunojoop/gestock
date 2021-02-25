<?php

namespace App\Entity;

use App\Entity\Article;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EntreeRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource(
 * itemOperations={"put","get"},
 * attributes={"access_control"="is_granted('ROLE_ADMIN')"}, )
 * @ApiFilter(DateFilter::class, properties={"dateEntree"})
 * @ApiFilter(SearchFilter::class, properties={"numeroBE": "partial"})
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
    private $numeroBE;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixUnitaireHT;

   
    

    /**
     * @ORM\ManyToOne(targetEntity=Entrepot::class, inversedBy="entree")
     */
    private $entrepot;

    /**
     * @ORM\ManyToOne(targetEntity=Stock::class, inversedBy="entree")
     * 
     */
    private $stock;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEntree;

   

   
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroBE(): ?string
    {
        return $this->numeroBE;
    }

    public function setNumeroBE(string $numeroBE): self
    {
        $this->numeroBE = $numeroBE;

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

    

    

    

    public function getEntrepot(): ?Entrepot
    {
        return $this->entrepot;
    }

    public function setEntrepot(?Entrepot $entrepot): self
    {
        $this->entrepot = $entrepot;

        return $this;
    }

    public function getStock(): ?Stock
    {
        return $this->stock;
    }

    public function setStock(?Stock $stock): self
    {
        $this->stock = $stock;
        $newStock=$this->stock->getStockActuel() + $this->quantite;
        //dd($newStock); 
        $stock=$this->stock->setStockActuel($newStock);
        //dd($stock); 
        //} 

        return $this;
    }

    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->dateEntree;
    }

    public function setDateEntree(\DateTimeInterface $dateEntree): self
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    

   
    

   
}
