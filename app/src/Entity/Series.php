<?php

namespace App\Entity;

use DateInterval;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SeriesRepository")
 */
class Series
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Actor", inversedBy="series")
     */
    private $Actors;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="dateinterval")
     */
    private $length;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rating;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLength(): ?DateInterval
    {
        return $this->length;
    }

    public function setLength(DateInterval $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getRating(): ?string
    {
        return $this->rating;
    }

    public function setRating(?string $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
