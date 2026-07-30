<?php

class Product
{
    private int $id;
    private string $nom;
    private float $prix;
    private string $image;
    private string $categorie;
    private string $createdAt;

    public function __construct(
        int $id,
        string $nom,
        float $prix,
        string $image,
        string $categorie,
        string $createdAt
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->image = $image;
        $this->categorie = $categorie;
        $this->createdAt = $createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getCategorie(): string
    {
        return $this->categorie;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function setCategorie(string $categorie): void
    {
        $this->categorie = $categorie;
    }
}