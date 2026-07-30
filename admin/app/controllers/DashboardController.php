<?php

class DashboardController extends Controller
{
    private AppointmentDAO $appointmentDAO;

    public function __construct()
    {
        Auth::check();
        $this->appointmentDAO = new AppointmentDAO();
    }

    public function index(): void
    {
        $totalAppointments = $this->appointmentDAO->count();

        $this->view("dashboard/index", [
            "totalAppointments" => $totalAppointments
        ]);
    }
}