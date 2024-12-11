<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 *
 * Copyright (c) 2020 Ronald M. Marasigan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @since Version 1
 * @link https://github.com/ronmarasigan/LavaLust
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
|
*/
$router->post('/index', 'UserDash::index');
$router->get('/about', 'UserDash::about');
$router->get('/typography', 'UserDash::typography');
$router->get('/contacts', 'UserDash::contacts');
$router->get('/adminDash', 'AdminDash::index');


//Admin
$router->get('/admins', 'AdminAuth::login');
$router->post('/adminlogin', 'AdminAuth::attemptLogin');
$router->get('/adminRegister', 'AdminAuth::register');
$router->post('/adminRegister', 'AdminAuth::attemptRegister');

//User
$router->get('/', 'UserAuth::login');
$router->post('/userLog', 'UserAuth::attemptLogin');
$router->get('/userRegister', 'UserAuth::register');
$router->post('/userRegister','UserAuth::attemptRegister');

$router->get('/reserve', 'ReserveCon::index');
$router->post('/reserve', 'ReserveCon::store'); 

    // User Routes
$router->get('/users', 'UserController::index'); // List all users
$router->get('/users/create', 'UserController::create'); // Show user creation form
$router->post('/users', 'UserController::store'); // Store new user
$router->get('/users/edit/(:num)', 'UserController::edit/$1'); // Edit user form
$router->post('/users/update/(:num)', 'UserController::update/$1'); // Update user
$router->get('/users/delete/(:num)', 'UserController::delete/$1'); // Delete user
$router->get('/users/show/(:num)', 'UserController::show/$1'); // Show user details

// Service Routes
$router->get('/services', 'ServiceController::index'); // List all services
$router->get('/services/create', 'ServiceController::create'); // Show service creation form
$router->post('/services', 'ServiceController::store'); // Store new service
$router->get('/services/edit/(:num)', 'ServiceController::edit/$1'); // Edit service form
$router->post('/services/update/(:num)', 'ServiceController::update/$1'); // Update service
$router->get('/services/delete/(:num)', 'ServiceController::delete/$1'); // Delete service
$router->get('/services/show/(:num)', 'ServiceController:   :show/$1'); // Show service details

// Appointment Routes
$router->get('/appointments', 'AppointmentController::index'); // List all appointments
$router->get('/appointments/create', 'AppointmentController::create'); // Show appointment creation form
$router->post('/appointments', 'AppointmentController::store'); // Store new appointment
$router->get('/appointments/edit/(:num)', 'AppointmentController::edit/$1'); // Edit appointment form
$router->post('/appointments/update/(:num)', 'AppointmentController::update/$1'); // Update appointment
$router->get('/appointments/delete/(:num)', 'AppointmentController::delete/$1'); // Delete appointment
$router->get('/appointments/show/(:num)', 'AppointmentController::show/$1'); // Show appointment details

// Payment Routes
$router->get('/payments', 'PaymentController::index'); // List all payments
$router->get('/payments/show/(:num)', 'PaymentController::show/$1'); // Show payment details

// Feedback Routes
$router->get('/feedback', 'FeedbackController::index'); // List all feedback
$router->get('/feedback/create', 'FeedbackController::create'); // Show feedback form
$router->post('/feedback', 'FeedbackController::store'); // Submit feedback
$router->get('/feedback/show/(:num)', 'FeedbackController::show/$1'); // Show feedback details
$router->get('/feedback/delete/(:num)', 'FeedbackController::delete/$1'); // Delete feedback







