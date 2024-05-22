<?php

namespace App\Entity;

use App\Repository\NavLinkRepository;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslatableTrait;


#[ORM\Entity(repositoryClass: NavLinkRepository::class)]
class NavLink implements TranslatableInterface
{

    use TranslatableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $idHtml = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'navLink', cascade: ['persist', 'remove'])]
    private ?PageCategory $pageCategory = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdHtml(): ?string
    {
        return $this->idHtml;
    }

    public function setIdHtml(string $idHtml): self
    {
        $this->idHtml = $idHtml;

        return $this;
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

    public function getPageCategory(): ?PageCategory
    {
        return $this->pageCategory;
    }

    public function setPageCategory(PageCategory $pageCategory): self
    {
        // set the owning side of the relation if necessary
        if ($pageCategory->getNavLink() !== $this) {
            $pageCategory->setNavLink($this);
        }

        $this->pageCategory = $pageCategory;

        return $this;
    }
}
