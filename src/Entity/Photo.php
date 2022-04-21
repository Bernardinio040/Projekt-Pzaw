<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Model\ImageInput;

/**
 * Photo
 *
 * @ORM\Table(name="photo", indexes={@ORM\Index(name="album_id", columns={"album_id"})})
 * @ORM\Entity
 * @ApiResource(
 *     formats={"json"},
 *     input=ImageInput::CLASS
 * )
 */
class Photo
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
     * @ORM\Column(name="src", type="string", length=100, nullable=false)
     */
    private $src;

    /**
     * @var string
     *
     * @ORM\Column(name="content_type", type="string", length=10, nullable=false)
     */
    private $contentType;

    /**
     * @var \Album
     *
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="album_id", referencedColumnName="id")
     * })
     */
    private $album;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(string $src): self
    {
        $this->src = $src;

        return $this;
    }

    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    public function setContentType(string $contentType): self
    {
        $this->contentType = $contentType;

        return $this;
    }

    public function getAlbum(): ?Album
    {
        return $this->album;
    }

    public function setAlbum(?Album $album): self
    {
        $this->album = $album;

        return $this;
    }


}
