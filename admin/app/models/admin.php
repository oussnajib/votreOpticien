<?php

require_once __DIR__ . '/../core/Model.php';

class Admin extends Model
{
    private ?int $id;
    private string $nom;
    private string $email;
    private string $motDePasse;

    public function __construct(
        ?int $id = null,
        string $nom = "",
        string $email = "",
        string $motDePasse = ""
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
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

    public function getMotDePasse(): string
    {
        return $this->motDePasse;
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

    public function setMotDePasse(string $motDePasse): void
    {
        $this->motDePasse = $motDePasse;
    }
}