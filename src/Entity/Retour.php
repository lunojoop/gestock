<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\RetourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * itemOperations={"put","get"},
 * attributes={"access_control"="is_granted('ROLE_ADMIN')"}, )
 * @ORM\Entity(repositoryClass=RetourRepository::class)
 */
class Retour
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
    private $numeroBR;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRetour;

    

    /**
     * @ORM\ManyToOne(targetEntity=Entrepot::class, inversedBy="retour")
     */
    private $entrepot;

    /**
     * @ORM\ManyToOne(targetEntity=Stock::class, inversedBy="retour")
     */
    private $stock;

    public function __construct()
    {
        $this->article = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroBR(): ?string
    {
        return $this->numeroBR;
    }

    public function setNumeroBR(string $numeroBR): self
    {
        $this->numeroBR = $numeroBR;
        $count=uniqid();
        $this->numeroBR = $numeroBR ;
        //$rest = substr(". $count .", -7);
        //$this->numeroBR= "BR".$rest;
        $this->numeroBR= "BR".$count;

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

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->dateRetour;
    }

    public function setDateRetour(\DateTimeInterface $dateRetour): self
    {
        $this->dateRetour = $dateRetour;

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

        return $this;
    }
}
