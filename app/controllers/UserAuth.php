<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserAuth extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('user');

    }

    public function login() {
        $this->call->view('auth/UserLogin');
    }
    public function attemptLogin() {
            if($this->form_validation->submitted()) {
                $email = $this->io->post('email');
                $password = $this->io->post('password');
                $data = $this->lauth->login($email, $password);
                if(empty($data)) {
                    $this->session->set_flashdata(['is_invalid' => 'is-invalid']);
                    $this->session->set_flashdata(['err_message' => 'These credentials do not match our records.']);
                } else {
                    $this->lauth->set_logged_in($data);
                }
                redirect('/userLog');
            } else {
                $this->call->view('auth/UserLogin');
            }
    }

    public function register() {
        $this->call->view('auth/UserRegister');
    }
    // public function processPayment() {
    //     require 'vendor/autoload.php';
    //     Stripe::setApiKey('your_secret_key');

    //     try {
    //         $charge = Charge::create([
    //             'amount' => 10000, // Amount in cents
    //             'currency' => 'usd',
    //             'source' => $this->request->input('stripeToken'), // Token from payment form
    //             'description' => 'Payment for Order',
    //         ]);

    //         redirect('/paymentSuccess');
    //     } catch (\Exception $e) {
    //         return $this->view('payment/index', ['error' => $e->getMessage()]);
    //     }
    // }


    public function attemptRegister() {
       
        if($this->form_validation->submitted()) {
            $username = $this->io->post('username');
            $email = $this->io->post('email');
            $this->form_validation
                    ->name('email')
                    ->required()
                    ->is_unique('userss', 'email', $email, 'Email was already taken.')
                ->name('username')
                    ->required()
                    ->is_unique('userss', 'username', $username, 'Username was already taken.')
                    ->min_length(5, 'Username name must not be less than 5 characters.')
                    ->max_length(20, 'Username name must not be more than 20 characters.')
                    ->alpha_numeric_dash('Special characters are not allowed in username.')
                ->name('password')
                    ->required();
                
                if($this->form_validation->run()) {
                    if($this->lauth->register($username, $email, $this->io->post('password_hash'))) {
                        $data = $this->lauth->login($email, $this->io->post('password_hash'));
                        $this->lauth->set_logged_in($data);
                        redirect('index');
                        set_flash_alert('danger', config_item('SQLError'));
                    }
                }  else {
                    set_flash_alert('danger', $this->form_validation->errors()); 
                    redirect('user/register');
                }
        } else {
            $this->call->view('Userauth/register');
        }
    }

    public function reserve() {
        $this->call->view('book');
    }
}
