<?php
require "vendor/autoload.php";


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Bill;
use QuickBooksOnline\API\Facades\Vendor;

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

try {
    // $vendor = $dataService->FindbyId('vendor', 56);
    $vendor = $dataService->FindAll('vendor');
    // $q = "select * from vendor where DisplayName like '%Bo%'";
    // $vendor = $dataService->Query($q,0,1);
    $error = $dataService->getLastError();

    if ($error) {
        echo "Terjadi Error <br>";
        echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
        echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
        echo "The Response message is: " . $error->getResponseBody() . "\n";
    }
    else {
        $result = [];
        foreach($vendor as $v){
            $result[] = [
                'value'=> $v->Id,
                'name' => $v->DisplayName,
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($result);die;

        // echo "Created Id={$vendor->Id}. Reconstructed response body:\n\n";
        // $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($vendor, $urlResource);
        // echo $xmlBody . "\n";
    }

} catch (Exception $e) {
    echo "Error \n";
    print_r($e->getMessage());
}
