<?php

class AuthController extends Controller
{
    private AdminDAO $adminDAO;

    public function __construct()
    {
        $this->adminDAO = new AdminDAO();
    }

    public function index(): void
    {
        $this->view('auth/login');
    }

    public function login(): void
{
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $admin = $this->adminDAO->findByEmail($email);

    if ($admin === null) {
        Session::set('error', 'Email incorrect.');
        header('Location: index.php?url=login');
        exit;
    }

    if (!password_verify($password, $admin->getMotDePasse())) {
        Session::set('error', 'Mot de passe incorrect.');
        header('Location: index.php?url=login');
        exit;
    }

    // Connexion réussie
    Session::set('admin_id', $admin->getId());
    Session::set('admin_nom', $admin->getNom());
    Session::set('admin_email', $admin->getEmail());

    
    header('Location: index.php?url=dashboard');
    exit;
}

    public function logout(): void
    {
        Session::destroy();

        header("Location: index.php");

        exit;
    }
}