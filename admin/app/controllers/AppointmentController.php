<?php

class AppointmentController extends Controller
{
    private AppointmentDAO $appointmentDAO;


    public function __construct()
    {
        // Vérifier que l'administrateur est connecté
        Auth::check();

        // Connexion DAO
        $this->appointmentDAO = new AppointmentDAO();
    }


    /**
     * Afficher la liste des rendez-vous
     */
    public function index(): void
    {
        $appointments = $this->appointmentDAO->findAll();


       
        echo "<pre>";
        print_r($appointments);
        echo "</pre>";
        exit;


        $this->view("appointments/index", [
            "appointments" => $appointments
        ]);
    }
}