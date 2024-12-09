<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ReserveCon extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->model('res');
    }

    public function index() {
        // Load reservation form view
        $this->call->view('book');
    }

    public function submit_reservation() {
        // Get the form data
        $name = $this->input->post('name');
        $gender = $this->input->post('gender');
        $age = $this->input->post('age');
        $place_id = $this->input->post('place_id');
        $number_of_attendees = $this->input->post('number_of_attendees');
        $reservation_datetime = $this->input->post('reservation_datetime');
        $payment_status = $this->input->post('payment_status');
        $payment_receipt_email = $this->input->post('payment_receipt_email');
    
        // Simple validation
        if (empty($name) || empty($gender) || empty($age) || empty($place_id) || empty($number_of_attendees) || empty($reservation_datetime) || empty($payment_status) || empty($payment_receipt_email)) {
            $this->session->set_flashdata('error', 'All fields are required.');
            redirect('reservation');
        }
    
        if (!filter_var($payment_receipt_email, FILTER_VALIDATE_EMAIL)) {
            $this->session->set_flashdata('error', 'Invalid email format.');
            redirect('reservation');
        }
    
        if (!is_numeric($age) || !is_numeric($number_of_attendees)) {
            $this->session->set_flashdata('error', 'Age and Number of Attendees must be numeric.');
            redirect('reservation');
        }
    
        // Proceed with the reservation if validation passes
        $data = [
            'name' => $name,
            'gender' => $gender,
            'age' => $age,
            'place_id' => $place_id,
            'number_of_attendees' => $number_of_attendees,
            'reservation_datetime' => $reservation_datetime,
            'payment_status' => $payment_status,
            'payment_receipt_email' => $payment_receipt_email,
            'created_at' => date('Y-m-d H:i:s')
        ];
    
        // Insert reservation into the database
        $reservation_id = $this->Reservation_model->insert_reservation($data);
    
        if ($reservation_id) {
            // Reservation was successful
            $this->session->set_flashdata('message', 'Reservation successfully made!');
            redirect('reservation/success');
        } else {
            // If something goes wrong
            $this->session->set_flashdata('error', 'Error making reservation, please try again.');
            redirect('reservation');
        }
    }
    

    public function success() {
        // Success page
        $this->load->view('reservation_success');
    }
}
?>
