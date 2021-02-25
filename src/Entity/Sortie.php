<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SortieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * itemOperations={"put","get"},
 * attributes={"access_control"="is_granted('ROLE_ADMIN')"}, )
 * @ORM\Entity(repositoryClass=SortieRepository::class)
 */
class Sortie
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
    private $numeroBS;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="date")
     */
    private $dateSortie;

   
    /**
     * @ORM\ManyToOne(targetEntity=Entrepot::class, inversedBy="sortie")
     */
    private $entrepot;

    /**
     * @ORM\ManyToOne(targetEntity=Stock::class, inversedBy="sortie")
     */
    private $stock;

    

   
   
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroBS(): ?int
    {
        return $this->numeroBS;
    }

    public function setNumeroBS(int $numeroBS): self
    {
        $this->numeroBS = $numeroBS;

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

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

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
        $newStock=$this->stock->getStockActuel() - $this->quantite;
        //dd($newStock); 
        $stock=$this->stock->setStockActuel($newStock);

        return $this;
    }

    

    
    
}

    

