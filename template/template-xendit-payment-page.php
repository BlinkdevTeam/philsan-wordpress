<?php
/*
Template Name: Xendit Payment Page
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $secret_key = XENDIT_SECRET_KEY;

    $external_id = 'event_' . time();

    $data = [
        'external_id' => $external_id,
        'amount' => 100,
        'description' => 'PRC Seminar Registration',
        'customer' => [
            'given_names' => $_POST['first_name'],
            'email' => $_POST['email'],
            'mobile_number' => $_POST['contact_number']
        ],
        'success_redirect_url' => home_url('/payment-success'),
        'failure_redirect_url' => home_url('/payment-failed')
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.xendit.co/v2/invoices');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ':');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);

    if (isset($result['invoice_url'])) {

        wp_redirect($result['invoice_url']);
        exit;

    } else {

        echo '<pre>';
        print_r($result);
        echo '</pre>';
    }
}
?>

<form method="POST">

    <input type="text" name="first_name" placeholder="First Name" required>
    <br><br>

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="text" name="contact_number" placeholder="Contact Number" required>
    <br><br>

    <button type="submit">
        Pay with Xendit
    </button>

</form>