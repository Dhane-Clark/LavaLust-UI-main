<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {

    public function index() {
        $this->call->model('UserModel');
        $data['users'] = $this->UserModel->get_all_users();
        $this->call->view('users/index',$data);

    }

    public function create() {
        $this->call->view('users/create');
    }

    public function store() {
        $this->call->library('form_validation');
        $this->form_validation
            ->name('name')->required()
            ->name('email')->required()->valid_email()
            ->name('phone');

        if ($this->form_validation->run() == FALSE) {
            $this->call->view('users/create', ['errors' => $this->form_validation->errors()]);
        } else {
            $this->call->model('UserModel');
            $this->UserModel->add_user($this->io->post());
            redirect('users/index');
        }
    }

    public function show($id) {
        $this->call->model('UserModel');
        $data['usersss'] = $this->UserModel->get_user_by_id($id);
        if (!$data['user']) {
            show_404(); // Show 404 if user not found
        }
        $this->call->view('users/show', $data);
    }
    

    public function edit($id) {
        $this->call->model('UserModel');
        $data['user'] = $this->UserModel->get_user_by_id($id);
        $this->call->view('users/edit', $data);
    }

    public function update($id) {
        $this->call->library('form_validation');
        $this->form_validation
            ->name('name')->required()
            ->name('email')->required()->valid_email()
            ->name('phone');

        if ($this->form_validation->run() == FALSE) {
            $this->call->view('users/edit', ['errors' => $this->form_validation->errors()]);
        } else {
            $this->call->model('UserModel');
            $this->UserModel->update_user($id, $this->io->post());
            redirect('users/index');
        }
    }

    public function delete($id) {
        $this->call->model('UserModel');
        $this->UserModel->delete_user($id);
        redirect('users/index');
    }
}
