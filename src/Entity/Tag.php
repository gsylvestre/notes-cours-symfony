<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=LessonCard::class, mappedBy="tags", cascade={"persist"})
     */
    private $lessonCards;

    public function __construct()
    {
        $this->lessonCards = new ArrayCollection();
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

    /**
     * @return Collection|LessonCard[]
     */
    public function getLessonCards(): Collection
    {
        return $this->lessonCards;
    }

    public function addLessonCard(LessonCard $lessonCard): self
    {
        if (!$this->lessonCards->contains($lessonCard)) {
            $this->lessonCards[] = $lessonCard;
            $lessonCard->addTag($this);
        }

        return $this;
    }

    public function removeLessonCard(LessonCard $lessonCard): self
    {
        if ($this->lessonCards->removeElement($lessonCard)) {
            $lessonCard->removeTag($this);
        }

        return $this;
    }
}
