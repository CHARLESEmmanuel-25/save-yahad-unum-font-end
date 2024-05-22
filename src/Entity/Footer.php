<?php

namespace App\Entity;

use App\Repository\FooterRepository;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslatableTrait;

#[ORM\Entity(repositoryClass: FooterRepository::class)]
class Footer implements TranslatableInterface
{

    use TranslatableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $contactMail = null;

    #[ORM\Column(length: 255)]
    private ?string $contactPhone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContactMail(): ?string
    {
        return $this->contactMail;
    }

    public function setContactMail(string $contactMail): self
    {
        $this->contactMail = $contactMail;

        return $this;
    }

    public function getContactPhone(): ?string
    {
        return $this->contactPhone;
    }

    public function setContactPhone(string $contactPhone): self
    {
        $this->contactPhone = $contactPhone;

        return $this;
    }
}
