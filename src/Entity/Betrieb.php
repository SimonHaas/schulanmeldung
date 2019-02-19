<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="betriebedaten")
 * @ORM\Entity(repositoryClass="App\Repository\BetriebRepository")
 */
class Betrieb
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Schueler", mappedBy="betrieb")
     */
    private $schueler;

    public function __construct()
    {
        $this->schueler = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Schueler[]
     */
    public function getSchueler(): Collection
    {
        return $this->schueler;
    }

    public function addSchueler(Schueler $schueler): self
    {
        if (!$this->schueler->contains($schueler)) {
            $this->schueler[] = $schueler;
            $schueler->setBetrieb($this);
        }

        return $this;
    }

    public function removeSchueler(Schueler $schueler): self
    {
        if ($this->schueler->contains($schueler)) {
            $this->schueler->removeElement($schueler);
            // set the owning side to null (unless already changed)
            if ($schueler->getBetrieb() === $this) {
                $schueler->setBetrieb(null);
            }
        }

        return $this;
    }
}
