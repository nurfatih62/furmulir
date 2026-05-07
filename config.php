<?php
session_start();
$url = "https://euyzwtfuqyvxcvtpyenl.supabase.co/rest/v1/pendaftaran";
$key = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImV1eXp3dGZ1cXl2eGN2dHB5ZW5sIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NzgwOTI3OTEsImV4cCI6MjA5MzY2ODc5MX0.K6wQHd2KUuWjE8a_XJ-Ng-eD4khEk6iyT2lqnhHZW2M";

function api_request($method, $endpoint, $data = null) {
    global $key;
    $ch = curl_init($endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'apikey: ' . $key,
        'Authorization: Bearer ' . $key,
        'Content-Type: application/json',
        'Prefer: return=representation'
    ]);
    if ($data) curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode($res, true);
}
?>
