<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>q98517su.beget.tech/test/send.php</title>
</head>
<body>
<?php
    // https://developers.google.com/sheets/api/quickstart/php
    // https://pocketadmin.tech/ru/%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%B0-%D1%81-4-%D0%B2%D0%B5%D1%80%D1%81%D0%B8%D0%B5%D0%B9-api-google-%D1%82%D0%B0%D0%B1%D0%BB%D0%B8%D1%86%D1%8B-%D0%BD%D0%B0-php/#Primery_raboty_s_API_Google_tablicy_na_php
    require_once __DIR__ . '/vendor/autoload.php';
    $googleAccountKeyFilePath = __DIR__ . '/service_key.json';
    putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $googleAccountKeyFilePath);
    $client = new Google_Client();
    $client->useApplicationDefaultCredentials();
    $client->addScope('https://www.googleapis.com/auth/spreadsheets');
    $service = new Google_Service_Sheets($client);
    $spreadsheetId = '1e_3K46IF55mAaInf1-6o1D_2fJPKosZfpcmVWNWMKF8';

    $host = 'localhost';
    $user = 'q98517su_1';
    $password = 'AzAzA1111';
    $database = 'q98517su_1';
    $link = mysqli_connect($host, $user, $password, $database);
    $query = "SELECT * FROM `test` WHERE `age` > 18;";
    $result = mysqli_query($link, $query);
    
    $values = [];

    $name = '';
    $surname = '';
    $age = 0;

    /*
    $range = 'Лист1';
    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    // var_dump($response);
    foreach ($response as $key => $value) {
        $name = $value[0];
        $surname = $value[1];
        $age = $value[2];
        array_push($values, [$name, $surname, $age]);
    }
    */

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $name = $row['name1'];
        $surname = $row['surname'];
        $age = $row['age'];
        // echo $name . ' ' . $surname . ' ' . $age . '</br>';
        array_push($values, [$name, $surname, $age]);
    }
    $values = array_unique($values, SORT_REGULAR);

    // идея норм, но так не работает, если вручную не чистить таблицу, будем проверять дубли на момент записи
    
    $ValueRange = new Google_Service_Sheets_ValueRange();
    $ValueRange->setValues($values);
    $options = ['valueInputOption' => 'USER_ENTERED'];
    $service->spreadsheets_values->update($spreadsheetId, 'Лист1!A2', $ValueRange, $options);