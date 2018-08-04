<?php

namespace App\Entity;

use App\Traits\EntityCreatedUpdatedTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BannerRepository")
 */
class Banner
{
    use EntityCreatedUpdatedTrait;

    const STATUS = [
        'ENABLED',
        'DISABLED'
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $status;

    /**
     * @ORM\Column(type="integer")
     */
    private $sortId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $introduction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buttonLabel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buttonUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buttonBgColour;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buttonBgHoverColour;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buttonFgColour;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buttonFgHoverColour;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSortId(): ?int
    {
        return $this->sortId;
    }

    public function setSortId($sortId): self
    {
        $this->sortId = $sortId;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getIntroduction(): ?string
    {
        return $this->introduction;
    }

    public function setIntroduction($introduction): self
    {
        $this->introduction = $introduction;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getButtonLabel(): ?string
    {
        return $this->buttonLabel;
    }

    public function setButtonLabel(?string $buttonLabel): self
    {
        $this->buttonLabel = $buttonLabel;

        return $this;
    }

    public function getButtonUrl(): ?string
    {
        return $this->buttonUrl;
    }

    public function setButtonUrl(?string $buttonUrl): self
    {
        $this->buttonUrl = $buttonUrl;

        return $this;
    }

    public function getButtonBgColour(): ?string
    {
        return $this->buttonBgColour;
    }

    public function setButtonBgColour(?string $buttonBgColour): self
    {
        $this->buttonBgColour = $buttonBgColour;

        return $this;
    }

    public function getButtonBgHoverColour(): ?string
    {
        return $this->buttonBgHoverColour;
    }

    public function setButtonBgHoverColour(?string $buttonBgHoverColour): self
    {
        $this->buttonBgHoverColour = $buttonBgHoverColour;

        return $this;
    }

    public function getButtonFgColour(): ?string
    {
        return $this->buttonFgColour;
    }

    public function setButtonFgColour(?string $buttonFGColour): self
    {
        $this->buttonFgColour = $buttonFGColour;

        return $this;
    }

    public function getButtonFgHoverColour(): ?string
    {
        return $this->buttonFgHoverColour;
    }

    public function setButtonFgHoverColour($buttonFgHoverColour): self
    {
        $this->buttonFgHoverColour = $buttonFgHoverColour;

        return $this;
    }

    public function __toString(): string
    {
        return (string) $this->getTitle();
    }
}
