<?php

// how to call remote api using php


// check if curl extension is loaded or not

if( !extension_loaded('curl') ) {
    die("curl not loaded");
}

$api_endpoint = 'https://jsonplaceholder.typicode.com/posts'; // use your own endpoint here

// Initialize curl session
$curl = curl_init();

// next setup curl configs
curl_setopt($curl, CURLOPT_URL, $api_endpoint); // Set the URL
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return the response as a string instead of outputting it
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Ignore SSL certificate verification (not recommended for production)


// Execute curl request
$response = curl_exec($curl);

// Check for errors
if(curl_errno($curl)) {
    $error_message = curl_error($curl);
    echo "Error: $error_message";
}

// Close curl session
curl_close($curl);

// print the response
echo $response;

file_put_contents(__DIR__ . '/data.json', $response);