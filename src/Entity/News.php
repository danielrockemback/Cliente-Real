<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: NewsRepository::class)]
#[Vich\Uploadable]
class News
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, NewsCategory>
     */
    #[ORM\ManyToMany(targetEntity: NewsCategory::class, inversedBy: 'news')]
    private Collection $category;

    #[ORM\Column(nullable: true)]
    private ?bool $status = null;

    #[ORM\Column(nullable: true)]
    private ?bool $highlighted = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $shortDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $youtubeVideoCode = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $fullDescription = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping: 'newsImage', fileNameProperty: "image")]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $imageUpdatedAt = null;

    #[ORM\Column(nullable: true)]
    private ?int $language = null;

    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, NewsCategory>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(NewsCategory $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
        }

        return $this;
    }

    public function removeCategory(NewsCategory $category): static
    {
        $this->category->removeElement($category);

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function isHighlighted(): ?bool
    {
        return $this->highlighted;
    }

    public function setHighlighted(?bool $highlighted): static
    {
        $this->highlighted = $highlighted;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(?\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): static
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getYoutubeVideoCode(): ?string
    {
        return $this->youtubeVideoCode;
    }

    public function setYoutubeVideoCode(?string $youtubeVideoCode): static
    {
        $this->youtubeVideoCode = $youtubeVideoCode;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->fullDescription;
    }

    public function setFullDescription(?string $fullDescription): static
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile): void
    {
        $this->imageFile = $imageFile;
        if (null !== $imageFile) {
            $this->imageUpdatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->imageUpdatedAt;
    }

    public function setImageUpdatedAt(?\DateTimeImmutable $imageUpdatedAt): void
    {
        $this->imageUpdatedAt = $imageUpdatedAt;
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }


}
