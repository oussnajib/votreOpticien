<?php

class ServiceController extends Controller
{
    private ServiceDAO $serviceDAO;

    public function __construct()
    {
        Auth::check();

        $this->serviceDAO = new ServiceDAO();
    }

    /**
     * Liste des services
     */
    public function index(): void
    {
        $services = $this->serviceDAO->findAll();

        $this->view("services/index", [
            "services" => $services
        ]);
    }

    /**
     * Afficher le formulaire d'ajout
     */
    public function create(): void
    {
        $this->view("services/create");
    }

    /**
     * Enregistrer un service
     */
    public function store(): void
    {
    $nom = trim($_POST["nom"]);
    $description = trim($_POST["description"]);

    $image = "";

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {

        $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

        $image = time() . "_" . basename($_FILES["image"]["name"]);

        move_uploaded_file(
            $_FILES["image"]["tmp_name"],
            "../public/uploads/services/" . $image
        );
    }

    $service = new Service(
        null,
        $nom,
        $description,
        $image,
        date("Y-m-d H:i:s")
    );

    $this->serviceDAO->create($service);

    header("Location: index.php?url=services");
    exit;
    }

    /**
     * Afficher le formulaire de modification
     */
    public function edit(): void
    {
        if (!isset($_GET["id"])) {
            header("Location: index.php?url=services");
            exit;
        }

        $service = $this->serviceDAO->findById((int) $_GET["id"]);

        if (!$service) {
            header("Location: index.php?url=services");
            exit;
        }

        $this->view("services/edit", [
            "service" => $service
        ]);
    }

    /**
     * Modifier un service
     */
    public function update(): void
    {
    $id = (int) $_POST["id"];

    $service = $this->serviceDAO->findById($id);

    if (!$service) {
        header("Location: index.php?url=services");
        exit;
    }

    $service->setNom(trim($_POST["nom"]));
    $service->setDescription(trim($_POST["description"]));

    // Nouvelle image
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {

        $image = time() . "_" . basename($_FILES["image"]["name"]);

        move_uploaded_file(
            $_FILES["image"]["tmp_name"],
            "../public/uploads/services/" . $image
        );

        $service->setImage($image);
    }

    $this->serviceDAO->update($service);

    header("Location: index.php?url=services");
    exit;
    }

    /**
     * Supprimer un service
     */
    public function delete(): void
    {
    if (!isset($_GET["id"])) {
        header("Location: index.php?url=services");
        exit;
    }

    $id = (int) $_GET["id"];

    $service = $this->serviceDAO->findById($id);

    if (!$service) {
        header("Location: index.php?url=services");
        exit;
    }

    // Supprimer l'image si elle existe
    $imagePath = "../public/uploads/services/" . $service->getImage();

    if (!empty($service->getImage()) && file_exists($imagePath)) {
        unlink($imagePath);
    }

    $this->serviceDAO->delete($id);

    header("Location: index.php?url=services");
    exit;
    }

    /**
     * Détails d'un service
     */
    public function show(): void
    {
    if (!isset($_GET["id"])) {
        header("Location: index.php?url=services");
        exit;
    }

    $service = $this->serviceDAO->findById((int)$_GET["id"]);

    if (!$service) {
        header("Location: index.php?url=services");
        exit;
    }

    $this->view("services/show", [
        "service" => $service
    ]);
    }
    
}