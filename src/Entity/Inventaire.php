<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InventaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * itemOperations={"put","get"},
 * attributes={"access_control"="is_granted('ROLE_USER')"}, )
 * @ORM\Entity(repositoryClass=InventaireRepository::class)
 */
class Inventaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateInventaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NumeroFI;

    /**
     * @ORM\ManyToOne(targetEntity=Entrepot::class, inversedBy="inventaire")
     */
    private $entrepot;

    /**
     * @ORM\ManyToOne(targetEntity=Stock::class, inversedBy="inventaire")
     */
    private $stock;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateInventaire(): ?\DateTimeInterface
    {
        return $this->dateInventaire;
    }

    public function setDateInventaire(\DateTimeInterface $dateInventaire): self
    {
        $this->dateInventaire = $dateInventaire;

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


    public function getNumeroFI(): ?string
    {
        return $this->NumeroFI;
    }

    public function setNumeroFI(string $NumeroFI): self
    {
        $this->NumeroFI = $NumeroFI;
        $count=uniqid();
        $this->NumeroFI = $NumeroFI ;
        //$rest = substr(". $count .", -7);
        //$this->numeroFI= "FI".$rest;
        $this->NumeroFI= "FI".$count;

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
        $stock=$this->stock->setStockInventaire($this->quantite);

        return $this;
    }
    
}

