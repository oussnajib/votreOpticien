<?php

class Message
{
    private ?int $id;
    private string $nom;
    private string $email;
    private string $telephone;
    private string $message;
    private string $dateEnvoi;

    public function __construct(
        ?int $id,
        string $nom,
        string $email,
        string $telephone,
        string $message,
        string $dateEnvoi
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->message = $message;
        $this->dateEnvoi = $dateEnvoi;
    }

    // Getters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getDateEnvoi(): string
    {
        return $this->dateEnvoi;
    }

    // Setters

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}