<?php

class User extends AbstractEntity
{
    private string $mail;
    private string $password;
    private string $firstName;
    private string $lastName;
    private string $pseudo;
    private ?string $profilPicture;
    private ?string $description;
    private bool $isAdmin;

    public function getMail(): string
    {
        return $this->mail;
    }

    public function setMail($newMail)
    {
        $this->mail = $newMail;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $newPassword)
    {
        $this->password = $newPassword;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $newFirstName)
    {
        $this->firstName = $newFirstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $newLastName)
    {
        $this->lastName = $newLastName;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $newPseudo)
    {
        $this->pseudo = $newPseudo;
    }

    public function getProfilPicture(): ?string
    {
        return $this->profilPicture;
    }

    public function setProfilPicture(?string $newProfilPicture)
    {
        $this->profilPicture = $newProfilPicture;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $newDescription)
    {
        $this->description = $newDescription;
    }

    public function getIsAdmin(): bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $newStatut)
    {
        $this->isAdmin = $newStatut;
    }
}
