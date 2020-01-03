<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActorRepository")
 */
class Actor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $birthPlace;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $socialMediaAccount;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Movie", mappedBy="Actors")
     */
    private $movies;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Series", mappedBy="Actors")
     */
    private $series;

    public function __construct()
    {
        $this->movies = new ArrayCollection();
        $this->series = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getBirthPlace(): ?string
    {
        return $this->birthPlace;
    }

    public function setBirthPlace(?string $birthPlace): self
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    public function getSocialMediaAccount(): ?string
    {
        return $this->socialMediaAccount;
    }

    public function setSocialMediaAccount(?string $socialMediaAccount): self
    {
        $this->socialMediaAccount = $socialMediaAccount;

        return $this;
    }

    /**
     * @return Collection|Movie[]
     */
    public function getMovies(): Collection
    {
        return $this->movies;
    }

    public function addMovie(Movie $movie): self
    {
        if (!$this->movies->contains($movie)) {
            $this->movies[] = $movie;
            $movie->setActors($this);
        }

        return $this;
    }

    public function removeMovie(Movie $movie): self
    {
        if ($this->movies->contains($movie)) {
            $this->movies->removeElement($movie);
            // set the owning side to null (unless already changed)
            if ($movie->getActors() === $this) {
                $movie->setActors(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Series[]
     */
    public function getSeries(): Collection
    {
        return $this->series;
    }

    public function addSeries(Series $series): self
    {
        if (!$this->series->contains($series)) {
            $this->series[] = $series;
            $series->setActors($this);
        }

        return $this;
    }

    public function removeSeries(Series $series): self
    {
        if ($this->series->contains($series)) {
            $this->series->removeElement($series);
            // set the owning side to null (unless already changed)
            if ($series->getActors() === $this) {
                $series->setActors(null);
            }
        }

        return $this;
    }
}
