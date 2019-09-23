<?php
require "vendor/autoload.php";


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Account;
use QuickBooksOnline\API\Facades\Vendor;
use QuickBooksOnline\API\Facades\Bill;
session_start();
$messages = [];
$errors = [];
$lineItems = [];

function getDataService(){
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
    return $dataService;
}

function getAllEntity($entity) {
    $dataService = getDataService();
    $data = $dataService->FindAll($entity);
    $error = $dataService->getLastError();
    if ($error)
        return $error->getResponseBody() ;
    return $data;
}

function searchVendor($vendorName){
    $dataService = getDataService();
    $q = "select * from vendor where DisplayName like '%$vendorName%'";
    $vendor = $dataService->Query($q,0,1);
    $error = $dataService->getLastError();
    // Get Only First Result
    if ($vendor && !$error)
        return $vendor[0];
}

function createVendor($vendorName){
    $dataService = getDataService();
    $theResourceObj = Vendor::create([
        "CompanyName" => $vendorName,
        "DisplayName" => $vendorName,
    ]);
    
    $resultingObj = $dataService->Add($theResourceObj);
    $error = $dataService->getLastError();
    return $resultingObj;
}

function searchAccount($accountName){
    $dataService = getDataService();
    $q = "select * from account where Name like '%$accountName%'";
    $account = $dataService->Query($q,0,1);
    $error = $dataService->getLastError();
    // Get Only First Result
    if ($account && !$error)
        return $account[0];
}

function createAccount($accountName){
    $dataService = getDataService();
    $accountObj = Account::create([
        "AccountType" => "Expense",
        "AccountSubType" => "Auto",
        "Name" => $accountName
    ]);
    $accountResult = $dataService->Add($accountObj);
    return $accountResult;
}

function createBill($bill) {
//     header('Content-Type: application/json');
//     echo json_encode($bill);die;
    $dataService = getDataService();
    $theResourceObj = Bill::create($bill);
    $resultingObj = $dataService->Add($theResourceObj);
    $error = $dataService->getLastError();
    if ($error) {
        $errors[] = $error;
    }
    return $resultingObj;
}

// Check Vendor
$vendorName = "mastereign visual arts pte ltd";
$vendor = searchVendor($vendorName);

if ($vendor) {
    // Vendor found. use vendorName
    $messages[] = "Vendor $vendorName Found<br>";
} else {
    // Create New Vendor
    $messages[] = "Vendor $vendorName Not Found <br>";
    $messages[] = "Creating Vendor $vendorName <br>";
    $vendor = createVendor($vendorName);
    $messages[] = "Vendor". $vendor->CompanyName ."created <br>";
}


$items = [
    ['description' => 'Redmi Note 5', 'amount' => 400],
    ['description' => 'Samsung Galaxy Note 10', 'amount'=> 599]
];

// Check Item
$messages[] = "- - - - - - - - - - - - - - - <br>";
foreach($items as $item) {
    $itemName = $item['description'];
    $account = searchAccount($itemName);
    if ($account) {
        $messages[] = "Account/Description/Item $itemName Found <br>";
    } else {
        $messages[] = "Creating account $itemName <br>";
        $account = createAccount($itemName);
        $messages[] = "Account $itemName Created <br>";
    }
    // $lineItems[] = $account;
    $lineItems[] = [
        "Amount" => $item['amount'],
        "DetailType" => "AccountBasedExpenseLineDetail",
        "AccountBasedExpenseLineDetail" =>
        [
            "AccountRef" =>
            [
                "value" => $account->Id,
            ]
        ]
    ];
}

// Push GR
$billObject = [
    "Line" => $lineItems,
    "VendorRef" =>
    [
        "value" => $vendor->Id,
    ]
];

// header('Content-Type: application/json');
// echo json_encode($billObject);die;

$bill = createBill($billObject);

header('Content-Type: application/json');
echo json_encode([
    'errors'=> $errors,
    'bill' => $bill
]);die;
