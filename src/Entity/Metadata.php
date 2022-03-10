<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Metadata
 *
 * @ORM\Table(name="metadata", indexes={@ORM\Index(name="photos_id", columns={"photos_id"})})
 * @ORM\Entity
 * @ApiResource()
 */
class Metadata
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="exposure_time", type="string", length=6, nullable=false)
     */
    private $exposureTime;

    /**
     * @var float
     *
     * @ORM\Column(name="iris", type="float", precision=10, scale=0, nullable=false)
     */
    private $iris;

    /**
     * @var int
     *
     * @ORM\Column(name="iso", type="integer", nullable=false)
     */
    private $iso;

    /**
     * @var int
     *
     * @ORM\Column(name="focal_length", type="smallint", nullable=false)
     */
    private $focalLength;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime", nullable=false)
     */
    private $datetime;

    /**
     * @var \Photo
     *
     * @ORM\ManyToOne(targetEntity="Photo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photos_id", referencedColumnName="id")
     * })
     */
    private $photos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExposureTime(): ?string
    {
        return $this->exposureTime;
    }

    public function setExposureTime(string $exposureTime): self
    {
        $this->exposureTime = $exposureTime;

        return $this;
    }

    public function getIris(): ?float
    {
        return $this->iris;
    }

    public function setIris(float $iris): self
    {
        $this->iris = $iris;

        return $this;
    }

    public function getIso(): ?int
    {
        return $this->iso;
    }

    public function setIso(int $iso): self
    {
        $this->iso = $iso;

        return $this;
    }

    public function getFocalLength(): ?int
    {
        return $this->focalLength;
    }

    public function setFocalLength(int $focalLength): self
    {
        $this->focalLength = $focalLength;

        return $this;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getPhotos(): ?Photo
    {
        return $this->photos;
    }

    public function setPhotos(?Photo $photos): self
    {
        $this->photos = $photos;

        return $this;
    }


}
