<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DepartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * itemOperations={"put","get"},
 * attributes={"access_control"="is_granted('ROLE_ADMIN')"}, )
 * @ORM\Entity(repositoryClass=DepartementRepository::class)
 */
class Departement
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
     * @ORM\OneToMany(targetEntity=Famille::class, mappedBy="departement")
     */
    private $famille;

    public function __construct()
    {
        
        $this->famille = new ArrayCollection();
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

    

    public function removeEntrepot(Entrepot $entrepot): self
    {
        if ($this->entrepots->removeElement($entrepot)) {
            $entrepot->removeDepartement($this);
        }

        return $this;
    }

    /**
     * @return Collection|Famille[]
     */
    public function getFamille(): Collection
    {
        return $this->famille;
    }

    public function addFamille(Famille $famille): self
    {
        if (!$this->famille->contains($famille)) {
            $this->famille[] = $famille;
            $famille->setDepartement($this);
        }

        return $this;
    }

    public function removeFamille(Famille $famille): self
    {
        if ($this->famille->removeElement($famille)) {
            // set the owning side to null (unless already changed)
            if ($famille->getDepartement() === $this) {
                $famille->setDepartement(null);
            }
        }

        return $this;
    }
}
