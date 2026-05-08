<?php
/*
Template Name: Sample Payment Page
*/

if (isset($_POST['payment_type'])) {

    $secret_key = PAYMONGO_SECRET;

    // User Information
    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $contact_number = sanitize_text_field($_POST['contact_number']);
    $email = sanitize_email($_POST['email']);
    $prc_number = sanitize_text_field($_POST['prc_number']);
    $company = sanitize_text_field($_POST['company']);

    // Payment Type
    $type = $_POST['payment_type'];

    if ($type === 'member') {
        $amount = 10000; // ₱100
        $description = "Member Registration";
    } else {
        $amount = 20000; // ₱200
        $description = "Non-Member Registration";
    }

    // PayMongo Payload
    $data = [
        "data" => [
            "attributes" => [
                "amount" => $amount,
                "description" => $description,
                "remarks" => $first_name . ' ' . $last_name,
                "metadata" => [
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "contact_number" => $contact_number,
                    "email" => $email,
                    "prc_number" => $prc_number,
                    "company" => $company,
                    "payment_type" => $type
                ]
            ]
        ]
    ];

    // Initialize cURL
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.paymongo.com/v1/links");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ":");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Execute Request
    $response = curl_exec($ch);

    // Error Handling
    if (curl_errno($ch)) {
        echo 'Curl Error: ' . curl_error($ch);
        exit;
    }

    curl_close($ch);

    // Decode Response
    $result = json_decode($response, true);

    // Redirect to Checkout
    if (isset($result['data']['attributes']['checkout_url'])) {

        $checkout_url = $result['data']['attributes']['checkout_url'];

        wp_redirect($checkout_url);
        exit;

    } else {

        echo '<pre>';
        print_r($result);
        echo '</pre>';

        echo "Error creating payment link.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sample Payment</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
        }

        input{
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button{
            padding: 12px 20px;
            cursor: pointer;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<h2>PRC Seminar Registration</h2>

<form method="POST">

    <input 
        type="text" 
        name="first_name" 
        placeholder="First Name"
        required
    >

    <input 
        type="text" 
        name="last_name" 
        placeholder="Last Name"
        required
    >

    <input 
        type="text" 
        name="contact_number" 
        placeholder="Contact Number"
        required
    >

    <input 
        type="email" 
        name="email" 
        placeholder="Email Address"
        required
    >

    <input 
        type="text" 
        name="prc_number" 
        placeholder="PRC Number"
        required
    >

    <input 
        type="text" 
        name="company" 
        placeholder="Company"
        required
    >

    <button type="submit" name="payment_type" value="member">
        Member – ₱100
    </button>

    <button type="submit" name="payment_type" value="non_member">
        Non-Member – ₱200
    </button>

</form>

</body>
</html>