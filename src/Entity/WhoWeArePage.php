<?php

namespace App\Entity;

use App\Repository\WhoWeArePageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: WhoWeArePageRepository::class)]
#[Vich\Uploadable]
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

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageOne = null;

    #[Vich\UploadableField(mapping: 'whoWeAreImage', fileNameProperty: "imageOne")]
    private ?File $imageFileOne = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $imageUpdatedAtOne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageTwo = null;

    #[Vich\UploadableField(mapping: 'whoWeAreImage', fileNameProperty: "imageTwo")]
    private ?File $imageFileTwo = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $imageUpdatedAtTwo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageThree = null;

    #[Vich\UploadableField(mapping: 'whoWeAreImage', fileNameProperty: "imageThree")]
    private ?File $imageFileThree = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $imageUpdatedAtThree = null;

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

    public function getImageOne(): ?string
    {
        return $this->imageOne;
    }

    public function setImageOne(?string $imageOne): void
    {
        $this->imageOne = $imageOne;
    }

    public function getImageFileOne(): ?File
    {
        return $this->imageFileOne;
    }

    public function setImageFileOne(?File $imageFileOne): void
    {
        $this->imageFileOne = $imageFileOne;

        if ($imageFileOne !== null) {
            $this->imageUpdatedAtOne = new \DateTimeImmutable();
        }
    }

    public function getImageUpdatedAtOne(): ?\DateTimeImmutable
    {
        return $this->imageUpdatedAtOne;
    }

    public function setImageUpdatedAtOne(?\DateTimeImmutable $imageUpdatedAtOne): void
    {
        $this->imageUpdatedAtOne = $imageUpdatedAtOne;
    }

    public function getImageTwo(): ?string
    {
        return $this->imageTwo;
    }

    public function setImageTwo(?string $imageTwo): void
    {
        $this->imageTwo = $imageTwo;
    }

    public function getImageFileTwo(): ?File
    {
        return $this->imageFileTwo;
    }

    public function setImageFileTwo(?File $imageFileTwo): void
    {
        $this->imageFileTwo = $imageFileTwo;

        if ($imageFileTwo !== null) {
            $this->imageUpdatedAtTwo = new \DateTimeImmutable();
        }
    }

    public function getImageUpdatedAtTwo(): ?\DateTimeImmutable
    {
        return $this->imageUpdatedAtTwo;
    }

    public function setImageUpdatedAtTwo(?\DateTimeImmutable $imageUpdatedAtTwo): void
    {
        $this->imageUpdatedAtTwo = $imageUpdatedAtTwo;
    }

    public function getImageThree(): ?string
    {
        return $this->imageThree;
    }

    public function setImageThree(?string $imageThree): void
    {
        $this->imageThree = $imageThree;
    }

    public function getImageFileThree(): ?File
    {
        return $this->imageFileThree;
    }

    public function setImageFileThree(?File $imageFileThree): void
    {
        $this->imageFileThree = $imageFileThree;

        if ($imageFileThree !== null) {
            $this->imageUpdatedAtThree = new \DateTimeImmutable();
        }
    }

    public function getImageUpdatedAtThree(): ?\DateTimeImmutable
    {
        return $this->imageUpdatedAtThree;
    }

    public function setImageUpdatedAtThree(?\DateTimeImmutable $imageUpdatedAtThree): void
    {
        $this->imageUpdatedAtThree = $imageUpdatedAtThree;
    }



}
