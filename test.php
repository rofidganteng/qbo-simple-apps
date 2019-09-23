<?php
require_once(__DIR__ . '/vendor/autoload.php');
use QuickBooksOnline\API\DataService\DataService;

session_start();

$accessToken = $_SESSION['sessionAccessToken'];

print_r($accessToken->getAccessToken());
die;

header('Content-Type: application/json');

$data = [
	'test' => $accessToken
];
echo json_encode($data);