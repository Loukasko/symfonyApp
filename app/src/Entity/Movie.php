<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MovieRepository")
 */
class Movie
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $director;

    /**
     * @ORM\Column(type="date")
     */
    private $year;

    /**
     * @ORM\Column(type="dateinterval")
     */
    private $length;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $rating;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Actor", inversedBy="movies")
     */
    private $Actors;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkToWatch;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkToBuy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $summary;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(?string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getLength(): ?\DateInterval
    {
        return $this->length;
    }

    public function setLength(\DateInterval $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(?float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getActors(): ?Actor
    {
        return $this->Actors;
    }

    public function setActors(?Actor $Actors): self
    {
        $this->Actors = $Actors;

        return $this;
    }

    public function getLinkToWatch(): ?string
    {
        return $this->linkToWatch;
    }

    public function setLinkToWatch(?string $linkToWatch): self
    {
        $this->linkToWatch = $linkToWatch;

        return $this;
    }

    public function getLinkToBuy(): ?string
    {
        return $this->linkToBuy;
    }

    public function setLinkToBuy(?string $linkToBuy): self
    {
        $this->linkToBuy = $linkToBuy;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }
}
