<?php

namespace App\Entity;

use App\Repository\FooterTranslationRepository;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TranslationInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslationTrait;

#[ORM\Entity(repositoryClass: FooterTranslationRepository::class)]
class FooterTranslation implements TranslationInterface
{

    use TranslationTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $contactTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $socialTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $newsletterTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $newsletterButtonText = null;

    #[ORM\Column(length: 255)]
    private ?string $newsletterDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $emailLabel = null;

    #[ORM\Column(length: 255)]
    private ?string $emailError = null;

    #[ORM\Column(length: 255)]
    private ?string $lastnameLabel = null;

    #[ORM\Column(length: 255)]
    private ?string $lastnameError = null;

    #[ORM\Column(length: 255)]
    private ?string $firstnameLabel = null;

    #[ORM\Column(length: 255)]
    private ?string $firstnameError = null;

    #[ORM\Column(length: 255)]
    private ?string $rgpdLabel = null;

    #[ORM\Column(length: 255)]
    private ?string $rgpdError = null;

    #[ORM\Column(length: 255)]
    private ?string $successTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $successSubtitle = null;

    #[ORM\Column(length: 255)]
    private ?string $successText = null;

    #[ORM\Column(length: 255)]
    private ?string $errorTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $errorSubtitle = null;

    #[ORM\Column(length: 255)]
    private ?string $errorText = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContactTitle(): ?string
    {
        return $this->contactTitle;
    }

    public function setContactTitle(string $contactTitle): self
    {
        $this->contactTitle = $contactTitle;

        return $this;
    }

    public function getSocialTitle(): ?string
    {
        return $this->socialTitle;
    }

    public function setSocialTitle(string $socialTitle): self
    {
        $this->socialTitle = $socialTitle;

        return $this;
    }

    public function getNewsletterTitle(): ?string
    {
        return $this->newsletterTitle;
    }

    public function setNewsletterTitle(string $newsletterTitle): self
    {
        $this->newsletterTitle = $newsletterTitle;

        return $this;
    }

    public function getNewsletterButtonText(): ?string
    {
        return $this->newsletterButtonText;
    }

    public function setNewsletterButtonText(string $newsletterButtonText): self
    {
        $this->newsletterButtonText = $newsletterButtonText;

        return $this;
    }

    public function getNewsletterDescription(): ?string
    {
        return $this->newsletterDescription;
    }

    public function setNewsletterDescription(string $newsletterDescription): self
    {
        $this->newsletterDescription = $newsletterDescription;

        return $this;
    }

    public function getEmailLabel(): ?string
    {
        return $this->emailLabel;
    }

    public function setEmailLabel(string $emailLabel): self
    {
        $this->emailLabel = $emailLabel;

        return $this;
    }

    public function getEmailError(): ?string
    {
        return $this->emailError;
    }

    public function setEmailError(string $emailError): self
    {
        $this->emailError = $emailError;

        return $this;
    }

    public function getLastnameLabel(): ?string
    {
        return $this->lastnameLabel;
    }

    public function setLastnameLabel(string $lastnameLabel): self
    {
        $this->lastnameLabel = $lastnameLabel;

        return $this;
    }

    public function getLastnameError(): ?string
    {
        return $this->lastnameError;
    }

    public function setLastnameError(string $lastnameError): self
    {
        $this->lastnameError = $lastnameError;

        return $this;
    }

    public function getFirstnameLabel(): ?string
    {
        return $this->firstnameLabel;
    }

    public function setFirstnameLabel(string $firstnameLabel): self
    {
        $this->firstnameLabel = $firstnameLabel;

        return $this;
    }

    public function getFirstnameError(): ?string
    {
        return $this->firstnameError;
    }

    public function setFirstnameError(string $firstnameError): self
    {
        $this->firstnameError = $firstnameError;

        return $this;
    }

    public function getRgpdLabel(): ?string
    {
        return $this->rgpdLabel;
    }

    public function setRgpdLabel(string $rgpdLabel): self
    {
        $this->rgpdLabel = $rgpdLabel;

        return $this;
    }

    public function getRgpdError(): ?string
    {
        return $this->rgpdError;
    }

    public function setRgpdError(string $rgpdError): self
    {
        $this->rgpdError = $rgpdError;

        return $this;
    }

    public function getSuccessTitle(): ?string
    {
        return $this->successTitle;
    }

    public function setSuccessTitle(string $successTitle): self
    {
        $this->successTitle = $successTitle;

        return $this;
    }

    public function getSuccessSubtitle(): ?string
    {
        return $this->successSubtitle;
    }

    public function setSuccessSubtitle(string $successSubtitle): self
    {
        $this->successSubtitle = $successSubtitle;

        return $this;
    }

    public function getSuccessText(): ?string
    {
        return $this->successText;
    }

    public function setSuccessText(string $successText): self
    {
        $this->successText = $successText;

        return $this;
    }

    public function getErrorTitle(): ?string
    {
        return $this->errorTitle;
    }

    public function setErrorTitle(string $errorTitle): self
    {
        $this->errorTitle = $errorTitle;

        return $this;
    }

    public function getErrorSubtitle(): ?string
    {
        return $this->errorSubtitle;
    }

    public function setErrorSubtitle(string $errorSubtitle): self
    {
        $this->errorSubtitle = $errorSubtitle;

        return $this;
    }

    public function getErrorText(): ?string
    {
        return $this->errorText;
    }

    public function setErrorText(string $errorText): self
    {
        $this->errorText = $errorText;

        return $this;
    }
}
