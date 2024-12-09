<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>
    <h2>Complete Your Payment</h2>
    <div id="paypal-button-container"></div>
    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID&currency=USD"></script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '100.00' // Replace with your order amount
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Send order ID to the backend
                    return fetch('<?= site_url('/capturePayment'); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ orderID: data.orderID }),
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.status === 'COMPLETED') {
                            window.location.href = '<?= site_url('/paymentSuccess'); ?>';
                        } else {
                            alert('Payment failed. Please try again.');
                        }
                    });
                });
            },
            onError: function(err) {
                alert('An error occurred during payment. Please try again.');
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>
