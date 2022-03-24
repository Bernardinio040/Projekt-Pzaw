<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Comment
 *
 * @ORM\Table(name="comment", indexes={@ORM\Index(name="photos_id", columns={"photos_id"})})
 * @ORM\Entity
 * @ApiResource()
 */
class Comment
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
     * @ORM\Column(name="contents", type="text", length=65535, nullable=false)
     */
    private $contents;

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

    public function getContents(): ?string
    {
        return $this->contents;
    }

    public function setContents(string $contents): self
    {
        $this->contents = $contents;

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
