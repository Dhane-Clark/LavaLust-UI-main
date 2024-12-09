<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class PaymentController extends Controller
{
    public function showPayment()
    {
        // Ensure the user is logged in
        if (!session()->has('user_id')) {
            redirect('/adminLog');
        }

        // Display the payment page
        return $this->view('payment/index');
    }

    public function capturePayment()
    {
        // Retrieve PayPal order ID from the request
        $orderID = $this->request->input('orderID');

        // Use PayPal API to capture the payment
        $clientId = 'YOUR_CLIENT_ID';
        $secret = 'YOUR_SECRET_KEY';
        $apiUrl = "https://api-m.sandbox.paypal.com";

        $ch = curl_init("$apiUrl/v2/checkout/orders/$orderID/capture");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Basic " . base64_encode("$clientId:$secret"),
            "Content-Type: application/json",
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        if (isset($result['status']) && $result['status'] === 'COMPLETED') {
            // Handle successful payment
            return $this->view('payment/success', ['transactionID' => $result['id']]);
        } else {
            // Handle payment failure
            return $this->view('payment/index', ['error' => 'Payment failed. Please try again.']);
        }
    }
}