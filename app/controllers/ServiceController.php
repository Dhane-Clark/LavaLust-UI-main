<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ServiceController extends Controller {

    public function index() {
        $this->call->model('ServiceModel');
        $data['services'] = $this->ServiceModel->get_all_services();
        $this->call->view('services/index', $data);
    }

    public function create() {
        $this->call->view('services/create');
    }

    public function store() {
        $this->call->library('form_validation');
        $this->form_validation
            ->name('name')->required()
            ->name('description')
            ->name('default_duration')->required()->numeric()
            ->name('price')->required()->numeric();

        if ($this->form_validation->run() == FALSE) {
            $this->call->view('services/create', ['errors' => $this->form_validation->errors()]);
        } else {
            $this->call->model('ServiceModel');
            $this->ServiceModel->add_service($this->io->post());
            redirect('services/index');
        }
    }

    public function show($id) {
        $this->call->model('ServiceModel');
        $data['service'] = $this->ServiceModel->get_service_by_id($id);
        $this->call->view('services/show', $data);
    }

    public function edit($id) {
        $this->call->model('ServiceModel');
        $data['service'] = $this->ServiceModel->get_service_by_id($id);
        $this->call->view('services/edit', $data);
    }

    public function update($id) {
        $this->call->library('form_validation');
        $this->form_validation
            ->name('name')->required()
            ->name('description')
            ->name('default_duration')->required()->numeric()
            ->name('price')->required()->numeric();

        if ($this->form_validation->run() == FALSE) {
            $this->call->view('services/edit', ['errors' => $this->form_validation->errors()]);
        } else {
            $this->call->model('ServiceModel');
            $this->ServiceModel->update_service($id, $this->io->post());
            redirect('services/index');
        }
    }

    public function delete($id) {
        $this->call->model('ServiceModel');
        $this->ServiceModel->delete_service($id);
        redirect('services/index');
    }
}
