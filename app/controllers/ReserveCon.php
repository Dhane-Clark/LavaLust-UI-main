<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ReserveCon extends Controller {

    // Display all appointments
    public function index() {
        $this->call->model('Appointment_model');
        $data['appointments'] = $this->Appointment_model->get_all_appointments();
        $this->call->view('book', $data);
    }

    // Show the form to create a new appointment
    public function create() {
        $this->call->view('book');
    }

    // Store a new appointment
    public function store() {
        $this->call->library('form_validation');
        $this->form_validation
            ->name('user_id')->required()->numeric()
            ->name('service_type')->required()
            ->name('appointment_date')->required()
            ->name('appointment_time')->required()
            ->name('duration')->required()->numeric()
            ->name('status')->required();

        // Validate the form
        if ($this->form_validation->run() == FALSE) {
            $this->call->view('appointments/create', ['errors' => $this->form_validation->errors()]);
        } else {
            $this->call->model('Appointment_model');
            $data = $this->io->post();
            $this->Appointment_model->add_appointment($data);
            redirect('reserve   ');
        }
    }

    // Display a single appointment by its ID
    public function show($id) {
        $this->call->model('AppointmentModel');
        $data['appointment'] = $this->AppointmentModel->get_appointment_by_id($id);
        if (!$data['appointment']) {
            show_404(); // Show 404 if appointment not found
        }
        $this->call->view('appointments/show', $data);
    }

    // Show the form to edit an existing appointment
    public function edit($id) {
        $this->call->model('AppointmentModel');
        $data['appointment'] = $this->AppointmentModel->get_appointment_by_id($id);
        $this->call->view('appointments/edit', $data);
    }

    // Update an existing appointment
    public function update($id) {
        $this->call->library('form_validation');
        $this->form_validation
            ->name('user_id')->required()->numeric()
            ->name('service_type')->required()
            ->name('appointment_date')->required()
            ->name('appointment_time')->required()
            ->name('duration')->required()->numeric()
            ->name('status')->required();

        if ($this->form_validation->run() == FALSE) {
            $this->call->view('appointments/edit', ['errors' => $this->form_validation->errors()]);
        } else {
            $this->call->model('AppointmentModel');
            $data = $this->io->post();
            $this->AppointmentModel->update_appointment($id, $data);
            redirect('appointments/index');
        }
    }

    // Delete an appointment
    public function delete($id) {
        $this->call->model('AppointmentModel');
        $this->AppointmentModel->delete_appointment($id);
        redirect('appointments/index');
    }
}
