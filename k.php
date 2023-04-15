<?php
// Get the webhook URL from the query string
$webhook_url = $_GET['url'];

// Read the incoming data from the POST request
$request_body = file_get_contents('php://input');

// Set up the request to the webhook URL
$ch = curl_init($webhook_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request_body);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Send the request to the webhook URL
$response = curl_exec($ch);

// Check for any errors
if ($response === false) {
    $error_message = curl_error($ch);
    echo "Error sending message to Discord: $error_message";
} else {
    echo "Message sent to Discord!";
}

// Close the cURL handle
curl_close($ch);
?>
