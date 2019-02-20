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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ausbildung", mappedBy="betrieb")
     */
    private $ausbildungen;

    public function __construct()
    {
        $this->schueler = new ArrayCollection();
        $this->ausbildungen = new ArrayCollection();
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

    /**
     * @return Collection|Ausbildung[]
     */
    public function getAusbildungen(): Collection
    {
        return $this->ausbildungen;
    }

    public function addAusbildungen(Ausbildung $ausbildungen): self
    {
        if (!$this->ausbildungen->contains($ausbildungen)) {
            $this->ausbildungen[] = $ausbildungen;
            $ausbildungen->setBetrieb($this);
        }

        return $this;
    }

    public function removeAusbildungen(Ausbildung $ausbildungen): self
    {
        if ($this->ausbildungen->contains($ausbildungen)) {
            $this->ausbildungen->removeElement($ausbildungen);
            // set the owning side to null (unless already changed)
            if ($ausbildungen->getBetrieb() === $this) {
                $ausbildungen->setBetrieb(null);
            }
        }

        return $this;
    }
}
