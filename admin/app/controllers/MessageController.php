<?php

class MessageController extends Controller
{
    private MessageDAO $messageDAO;

    public function __construct()
    {
        Auth::check();

        $this->messageDAO = new MessageDAO();
    }

    /**
     * Liste des messages
     */
    public function index(): void
    {
        $messages = $this->messageDAO->findAll();

        $this->view("messages/index", [
            "messages" => $messages
        ]);
    }

    /**
     * Voir un message
     */
    public function show(): void
    {
        if (!isset($_GET["id"])) {
            header("Location: index.php?url=messages");
            exit;
        }

        $message = $this->messageDAO->findById((int)$_GET["id"]);

        if (!$message) {
            header("Location: index.php?url=messages");
            exit;
        }

        $this->view("messages/show", [
            "message" => $message
        ]);
    }

    /**
     * Supprimer un message
     */
    public function delete(): void
    {
    if (!isset($_GET["id"])) {
        header("Location: index.php?url=messages");
        exit;
    }

    $id = (int) $_GET["id"];

    $message = $this->messageDAO->findById($id);

    if (!$message) {
        header("Location: index.php?url=messages");
        exit;
    }

    $this->messageDAO->delete($id);

    header("Location: index.php?url=messages");
    exit;
    }
    
}