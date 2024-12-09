<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminDash extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_id')) {
            redirect('/adminLog'); // Redirect to login if not logged in
        }
    }

    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $this->call->view('/adminDash', $data);
    }
}

?>
