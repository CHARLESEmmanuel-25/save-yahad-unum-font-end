<?php

namespace App\Entity;

use App\Repository\NavBarTranslationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Knp\DoctrineBehaviors\Contract\Entity\TranslationInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslationTrait;

#[ORM\Entity(repositoryClass: NavBarTranslationRepository::class)]
class NavBarTranslation implements TranslationInterface
{

    use TranslationTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'uuid')]
    private ?Uuid $uuid = null;

    #[ORM\Column(length: 255)]
    private ?string $donateText = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?Uuid
    {
        return $this->uuid;
    }

    public function setUuid(Uuid $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getDonateText(): ?string
    {
        return $this->donateText;
    }

    public function setDonateText(string $donateText): self
    {
        $this->donateText = $donateText;

        return $this;
    }
}
