<?php
//assumes you already installed the api client "composer require google/apiclient:^2.0"

function initiateSheetCredentials(){

    require __DIR__ . '/vendor/autoload.php';

    $googleAccountKey=__DIR__ . '/******';
    putenv('GOOGLE_APPLICATION_CREDENTIALS='.$googleAccountKey);

    $client = new Google_Client();
    $client->useApplicationDefaultCredentials();
    $client->addScope('https://www.googleapis.com/auth/spreadsheets');

    $service = new Google_Service_Sheets($client);
    return $service;
}

function readSheet($range){

    $service=initiateSheetCredentials();
    $spreadsheetId = '*****';
    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    $values = $response->getValues();

    if (!empty($values)){

        foreach($values as $row){
            print_r($row);
        }
    }

}


function writeSheet($range,$sends){

    $service=initiateSheetCredentials();
    $spreadsheetId = '*****';
    $sends=[[$sends]];
    $ValueRanges= new Google_Service_Sheets_ValueRange();
    $options =['valueInputOption'=>'USER_ENTERED'];
    $ValueRanges->setValues($sends);


    $service->spreadsheets_values->update($spreadsheetId,$range,$ValueRanges,$options);

}

?>