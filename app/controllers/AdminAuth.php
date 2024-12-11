<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminAuth extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('AdminModel');
    }

    // Show login page
    public function login() {
        $this->call->view('auth/AdminLogin');
    }

    // Attempt to login the admin
    public function attemptlogin()
    {
        if ($this->form_validation->submitted()) {
            $email = $this->io->post('email');
            $password = $this->io->post('password');

            // Fetch admin by email
            $admin = $this->AdminModel->checkAdminCredentials($email);

            if ($admin) {
                // Admin found, check password
                if (password_verify($password, $admin['password_hash'])) {
                    // Password matches, set session and redirect
                    $this->session->set_userdata('admin_id', $admin['admin_id']);
                    redirect('adminDash');  // Redirect to dashboard or home page
                } else {
                    // Password doesn't match
                    set_flash_alert('danger', 'Invalid email or password.');
                    redirect('admins');
                }
            } else {
                // Admin not found
                set_flash_alert('danger', 'Invalid email or password.');
                redirect('admins');
            }
        } else {
            // If the form is not submitted, show the login page again
            $this->call->view('auth/AdminLogin');
        }
    }

    // Show registration page
    public function register() {
        $this->call->view('auth/AdminRegister');
    }

    // Register a new admin
    public function attemptRegister() {
        $email = $this->io->post('email');
        $password = password_hash($this->io->post('password'), PASSWORD_BCRYPT);

        // Register the new admin
        $this->AdminModel->registerAdmin($email, $password);

        set_flash_alert('success', 'Admin registered successfully.');
        $this->call->view('auth/AdminLogin');
    }
}
?>
