<?php

namespace App\Entity;

use App\Repository\WhoWeArePageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WhoWeArePageRepository::class)]
class WhoWeArePage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $presentationPartOne = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $presentationPartTwo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $presentationPartThree = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $youTubeVideoCode = null;

    #[ORM\Column(nullable: true)]
    private ?int $language = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPresentationPartOne(): ?string
    {
        return $this->presentationPartOne;
    }

    public function setPresentationPartOne(?string $presentationPartOne): static
    {
        $this->presentationPartOne = $presentationPartOne;

        return $this;
    }

    public function getPresentationPartTwo(): ?string
    {
        return $this->presentationPartTwo;
    }

    public function setPresentationPartTwo(?string $presentationPartTwo): static
    {
        $this->presentationPartTwo = $presentationPartTwo;

        return $this;
    }

    public function getPresentationPartThree(): ?string
    {
        return $this->presentationPartThree;
    }

    public function setPresentationPartThree(?string $presentationPartThree): static
    {
        $this->presentationPartThree = $presentationPartThree;

        return $this;
    }

    public function getYouTubeVideoCode(): ?string
    {
        return $this->youTubeVideoCode;
    }

    public function setYouTubeVideoCode(?string $youTubeVideoCode): static
    {
        $this->youTubeVideoCode = $youTubeVideoCode;

        return $this;
    }

    public function getLanguage(): ?int
    {
        return $this->language;
    }

    public function setLanguage(?int $language): static
    {
        $this->language = $language;

        return $this;
    }
}
