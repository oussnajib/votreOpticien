<?php

class Appointment
{
    private int $id;
    private string $service;
    private string $sousService;
    private string $dateRdv;
    private string $heure;
    private string $prenom;
    private string $nom;
    private string $email;
    private string $telephone;
    private string $message;
    private string $createdAt;

    public function __construct(
        int $id,
        string $service,
        string $sousService,
        string $dateRdv,
        string $heure,
        string $prenom,
        string $nom,
        string $email,
        string $telephone,
        string $message,
        string $createdAt
    ){
        $this->id = $id;
        $this->service = $service;
        $this->sousService = $sousService;
        $this->dateRdv = $dateRdv;
        $this->heure = $heure;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->message = $message;
        $this->createdAt = $createdAt;
    }

    public function getId(){ return $this->id; }

    public function getService(){ return $this->service; }

    public function getSousService(){ return $this->sousService; }

    public function getDateRdv(){ return $this->dateRdv; }

    public function getHeure(){ return $this->heure; }

    public function getPrenom(){ return $this->prenom; }

    public function getNom(){ return $this->nom; }

    public function getEmail(){ return $this->email; }

    public function getTelephone(){ return $this->telephone; }

    public function getMessage(){ return $this->message; }

    public function getCreatedAt(){ return $this->createdAt; }
}