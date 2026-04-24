<?php
/*
Template Name: Sample Payment Page
*/

if (isset($_POST['payment_type'])) {

    $secret_key = PAYMONGO_SECRET;

    $type = $_POST['payment_type'];

    if ($type === 'member') {
        $amount = 10000;
        $description = "Member Registration";
    } else {
        $amount = 20000;
        $description = "Non-Member Registration";
    }

    $data = [
        "data" => [
            "attributes" => [
                "amount" => $amount,
                "description" => $description
            ]
        ]
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.paymongo.com/v1/links");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ":");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);

    if (isset($result['data']['attributes']['checkout_url'])) {
        wp_redirect($result['data']['attributes']['checkout_url']);
        exit;
    } else {
        echo "Error creating payment link";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sample Payment</title>
</head>
<body>

<h2>PRC Seminar Registration</h2>

<form method="POST">
    <button type="submit" name="payment_type" value="member">
        Member – ₱100
    </button>

    <button type="submit" name="payment_type" value="non_member">
        Non-Member – ₱200
    </button>
</form>

</body>
</html>