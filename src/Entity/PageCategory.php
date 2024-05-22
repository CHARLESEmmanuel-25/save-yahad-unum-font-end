<?php

namespace App\Entity;

use App\Repository\PageCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslatableTrait;

#[ORM\Entity(repositoryClass: PageCategoryRepository::class)]
class PageCategory implements TranslatableInterface
{
    use TranslatableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(inversedBy: 'pageCategory', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?NavLink $navLink = null;

    #[ORM\OneToMany(mappedBy: 'pageCategory', targetEntity: Paragraph::class, orphanRemoval: true)]
    private Collection $paragraphs;

    public function __construct()
    {
        $this->paragraphs = new ArrayCollection();
    }

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

    public function getNavLink(): ?NavLink
    {
        return $this->navLink;
    }

    public function setNavLink(NavLink $navLink): self
    {
        $this->navLink = $navLink;

        return $this;
    }

    /**
     * @return Collection<int, Paragraph>
     */
    public function getParagraphs(): Collection
    {
        return $this->paragraphs;
    }

    public function addParagraph(Paragraph $paragraph): self
    {
        if (!$this->paragraphs->contains($paragraph)) {
            $this->paragraphs->add($paragraph);
            $paragraph->setPageCategory($this);
        }

        return $this;
    }

    public function removeParagraph(Paragraph $paragraph): self
    {
        if ($this->paragraphs->removeElement($paragraph)) {
            // set the owning side to null (unless already changed)
            if ($paragraph->getPageCategory() === $this) {
                $paragraph->setPageCategory(null);
            }
        }

        return $this;
    }
}
