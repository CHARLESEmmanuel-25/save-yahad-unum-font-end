<?php

namespace App\Entity;

use App\Repository\ParagraphRepository;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslatableTrait;

#[ORM\Entity(repositoryClass: ParagraphRepository::class)]
class Paragraph implements TranslatableInterface
{

    use TranslatableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $media = null;

    #[ORM\Column]
    private ?bool $mediaDirection = null;

    #[ORM\ManyToOne(inversedBy: 'paragraphs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PageCategory $pageCategory = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ParagraphCategory $paragraphCategory = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedia(): ?string
    {
        return $this->media;
    }

    public function setMedia(string $media): self
    {
        $this->media = $media;

        return $this;
    }

    public function isMediaDirection(): ?bool
    {
        return $this->mediaDirection;
    }

    public function setMediaDirection(bool $mediaDirection): self
    {
        $this->mediaDirection = $mediaDirection;

        return $this;
    }

    public function getPageCategory(): ?PageCategory
    {
        return $this->pageCategory;
    }

    public function setPageCategory(?PageCategory $pageCategory): self
    {
        $this->pageCategory = $pageCategory;

        return $this;
    }

    public function getParagraphCategory(): ?ParagraphCategory
    {
        return $this->paragraphCategory;
    }

    public function setParagraphCategory(?ParagraphCategory $paragraphCategory): self
    {
        $this->paragraphCategory = $paragraphCategory;

        return $this;
    }
}
