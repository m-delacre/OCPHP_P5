<?php

class Post
{
    private int $id;
    private User $author;
    private DateTime $date;
    private string $title;
    private string $chapo;
    private string $content;
    private ?string $banner;
    private bool $isVisible;

    public function __construct($id, $authorID, $date, $title, $chapo, $content, $banner, $isVisible)
    {
        $this->id = $id;

        $userManager = new UserManager(DatabaseConnection::getInstance());
        $newAuthor = $userManager->getUserById($authorID);
        $this->author = $newAuthor;

        $this->date = new DateTime($date);
        $this->title = $title;
        $this->chapo = $chapo;
        $this->content = $content;
        $this->banner = $banner;
        $this->isVisible = $isVisible;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $newId)
    {
        $this->id = $newId;
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
        return $this->author;
    }

    public function getAuthorPseudo(): ?string
    {
        return $this->author->getPseudo();
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
        $this->title = $newChapo;
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
