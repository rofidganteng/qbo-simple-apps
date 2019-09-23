<?php
require "vendor/autoload.php";


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Bill;

session_start();
$accessToken = $_SESSION['sessionAccessToken'];

$config = include('config.php');
$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => $config['client_id'],
    'ClientSecret' =>  $config['client_secret'],
    'RedirectURI' => $config['oauth_redirect_uri'],
    'scope' => $config['oauth_scope'],
    'baseUrl' => "development"
));
$accessToken = $_SESSION['sessionAccessToken'];
$dataService->updateOAuth2Token($accessToken);


$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
$dataService->throwExceptionOnError(true);
//Add a new Vendor
$theResourceObj = Bill::create([
    "Line" =>
    [
        [
            "Id" => "1",
            "Amount" => 799.00,
            "DetailType" => "AccountBasedExpenseLineDetail",
            "AccountBasedExpenseLineDetail" =>
            [
                "AccountRef" =>
                [
                    "value" => "7"
                ]
            ]
        ]
    ],
    "VendorRef" =>
    [
        "value" =>"11",
        "name" => "Pabrik Jokowi"
    ]
]);

$resultingObj = $dataService->Add($theResourceObj);
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    header('Content-Type: application/json');
    echo json_encode($resultingObj);die;
    echo "Created Id={$resultingObj->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingObj, $urlResource);
    echo $xmlBody . "\n";
}
