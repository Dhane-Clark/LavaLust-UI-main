<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminDash extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->call->view('adminDash');
        
    }

    public function index()
    {
        $this->call->model('Appointment_model'); // Load the Appointment model
        $data['appointments'] = $this->Appointment_model->get_all_appointments();  // Get all appointments
        //var_dump($this->Appointment_model->get_all_appointments());
        //exit();
        $this->call->view('adminDash', $data);  // Pass the data to the view
    }
}

?>
