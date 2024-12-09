<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminAuth extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('admin');

    }

    public function login() {
        $this->call->view('auth/AdminLogin');
    }
    public function attemptlogin()
{
    if ($this->form_validation->submitted()) {
        $email = $this->io->post('email');
        $password = $this->io->post('password');
        $admin = $this->Admin->checkAdminCredentials($email, $password);

        if ($admin && isset($admin['password_hash'])) {
            if (password_verify($password, $admin['password_hash'])) {
                $this->session->set_userdata('admin_id', $admin['admin_id']);
                redirect('index');
            } else {
                set_flash_alert('danger', 'Invalid email or password.');
                redirect('adminLog');
            }
        }  else {
            set_flash_alert('danger', 'Invalid email or password.');
            redirect('adminLog');
        }
    } else {
        $this->call->view('auth/AdminLogin');
    }
}


    public function register() {
        $this->call->view('auth/AdminRegister');
    }

    public function attemptRegister() {
        $email = $this->io->post('email');
        $password = password_hash($this->io->post('password'), PASSWORD_BCRYPT);

        $this->db->table('Admins')->insert([
            'email' => $email,
            'password_hash' => $password
        ]);

        set_flash_alert('success', 'Admin registered successfully.');
        $this->call->view('auth/AdminLogin');
        
    }
}
?>
