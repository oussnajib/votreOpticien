<?php

class DashboardController extends Controller
{
    private AppointmentDAO $appointmentDAO;
    private ProductDAO $productDAO;

    public function __construct()
    {
        Auth::check();

        $this->appointmentDAO = new AppointmentDAO();
        $this->productDAO = new ProductDAO();
    }

    public function index(): void
    {
        $totalAppointments = $this->appointmentDAO->count();
        $productsCount = $this->productDAO->count();

        $this->view("dashboard/index", [
            "totalAppointments" => $totalAppointments,
            "productsCount" => $productsCount
        ]);
    }
}