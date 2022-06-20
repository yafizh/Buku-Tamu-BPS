<?php
$ch = curl_init();
$headers  = [
            'Authorization: Bearer EAAH7AmFltuMBAAXt5xYRhTbt1LrxHbACAFNqEl1v0M6JOYzOnRs3XLZCJqryjymSgdncPJrkzbIY3MpTnmUSPKOgE4FJj0sRyXMDstZB9fxPnky3Sululr63v78kILWpEP8o8UufKgjXkIZCZCahQEsheOzsgAt5BRZAVIxNr7qGZCYLLzVXNYuuQzyk89xZCv4AMGCA2JVUQZDZD',
            'Content-Type: application/json',
        ];
$postData = [
    'messaging_product' => 'whatsapp',
    'to' => '62895348676674',
    'type' => 'template',
    'template' => [
        'name' => 'hello_world',
        'language' => [
            'code' => 'en_US'
        ],
    ],
];
curl_setopt($ch, CURLOPT_URL,"https://graph.facebook.com/v13.0/62895348676674/messages");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));           
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result     = curl_exec ($ch);
$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
var_dump($result);
var_dump($statusCode);