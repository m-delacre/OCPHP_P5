<?php

class Post extends AbstractEntity
{
    private ?int $idUser = null;
    private ?User $author = null;
    private DateTime $date;
    private string $title;
    private string $chapo;
    private string $content;
    private ?string $banner;
    private bool $isVisible;

    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser)
    {
        $this->idUser = $idUser;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function getDateFr()
    {
        return $this->date->format('d/m/Y');
    }

    public function setDate(string $newDate)
    {
        $this->date = new DateTime($newDate);
    }

    public function getAuthor(): ?User
    {
        if ($this->author == null) {
            if ($this->idUser != null) {
                $userManager = new UserManager(DatabaseConnection::getInstance());
                $newAuthor = $userManager->getUserById($this->idUser);
                $this->author = $newAuthor;
            }
        }
        return $this->author;
    }

    public function getAuthorPseudo(): ?string
    {
        return $this->getAuthor()->getPseudo();
    }

    public function setAuthor(User $newAuthor)
    {
        $this->author = $newAuthor;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $newTitle)
    {
        $this->title = $newTitle;
    }

    public function getChapo(): string
    {
        return $this->chapo;
    }

    public function setChapo(string $newChapo)
    {
        $this->chapo = $newChapo;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $newContent)
    {
        $this->content = $newContent;
    }

    public function getBanner(): ?string
    {
        return $this->banner;
    }

    public function setBanner(?string $newBanner)
    {
        $this->banner = $newBanner;
    }

    public function getIsVisible(): bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $newIsVisible)
    {
        $this->isVisible = $newIsVisible;
    }
}
