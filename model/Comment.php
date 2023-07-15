<?php

class Comment
{
    private int $id;
    private User $author;
    private int $articleId;
    private string $comment;
    private DateTime $date;
    private bool $isVisible;

    public function __construct($id, $authorID,$articleID,$comment,$date,$isVisible)
    {
        $this->id = $id;

        $userManager = new UserManager(DatabaseConnection::getInstance());
        $newAuthor = $userManager->getUserById($authorID);
        $this->author = $newAuthor;

        $this->articleId = $articleID;
        $this->comment = $comment;
        $this->date = new DateTime($date);
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

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function setArticleId($newArticleId)
    {
        $this->articleId = $newArticleId;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment($newComment)
    {
        $this->comment = $newComment;
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

    public function getIsVisible(): bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $newIsVisible)
    {
        $this->isVisible = $newIsVisible;
    }
}