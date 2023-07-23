<?php

class Comment extends AbstractEntity
{
    private ?int $idUser = null;
    private ?User $author = null;
    private int $idArticle;
    private string $comment;
    private DateTime $date;
    private bool $isVisible;

    public function getIdUser(): int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser)
    {
        $this->idUser = $idUser;
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

    public function getIdArticle(): int
    {
        return $this->idArticle;
    }

    public function setIdArticle($newArticleId)
    {
        $this->idArticle = $newArticleId;
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