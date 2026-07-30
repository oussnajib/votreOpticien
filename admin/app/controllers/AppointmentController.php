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


        $this->view("appointments/index", [
            "appointments" => $appointments
        ]);
    }

    public function show(): void
    {
    if (!isset($_GET["id"])) {
        header("Location: index.php?url=appointments");
        exit;
    }

    $appointment = $this->appointmentDAO->findById((int) $_GET["id"]);

    if (!$appointment) {
        header("Location: index.php?url=appointments");
        exit;
    }

    $this->view("appointments/show", [
        "appointment" => $appointment
    ]);
    }

    public function edit(): void
    {
    if (!isset($_GET['id'])) {
        header("Location: index.php?url=appointments");
        exit;
    }

    $appointment = $this->appointmentDAO->findById((int) $_GET['id']);

    if (!$appointment) {
        header("Location: index.php?url=appointments");
        exit;
    }

    $this->view("appointments/edit", [
        "appointment" => $appointment
    ]);
    }

    public function update(): void
    {
    $current = $this->appointmentDAO->findById((int)$_POST["id"]);

    $appointment = new Appointment(
        $_POST["id"],
        $_POST["service"],
        $_POST["sous_service"],
        $_POST["date_rdv"],
        $_POST["heure"],
        $_POST["prenom"],
        $_POST["nom"],
        $_POST["email"],
        $_POST["telephone"],
        $_POST["message"],
        $current->getCreatedAt()
    );

    $this->appointmentDAO->update($appointment);

    header("Location: index.php?url=appointments");
    exit;
    }   

    public function delete(): void
    {
    if (!isset($_GET["id"])) {
        header("Location: index.php?url=appointments");
        exit;
    }

    $id = (int) $_GET["id"];

    $this->appointmentDAO->delete($id);

    header("Location: index.php?url=appointments");
    exit;
    }
}