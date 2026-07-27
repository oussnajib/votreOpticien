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
}