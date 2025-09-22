<?php


require 'vendor/autoload.php'; // Connecting the Composer autoloader (Facebook API)

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


// SAVE DATA RIGTH AWAY
$userName = isset($_POST['name']) ? $_POST['name'] : '';
$userPhone = isset($_POST['phone']) ? formatPhoneNumber($_POST['phone']) : '';
$userEmail = isset($_POST['email']) ? $_POST['email'] : '';

writeLog('!!! SUBMIT: UserName: ' . $userName . '. userPhone: ' . $userPhone . '. userEmail: ' . $userEmail);



$subid = isset($_COOKIE['subid']) ? $_COOKIE['subid'] : '';
$kreo = isset($_COOKIE['kreo']) ? $_COOKIE['kreo'] : '';
$pxCookie = isset($_COOKIE['pxCookie']) ? $_COOKIE['pxCookie'] : '';
$source = isset($_COOKIE['source']) ? $_COOKIE['source'] : '';
$geo = isset($_COOKIE['geo']) ? $_COOKIE['geo'] : '';
$buyer = isset($_COOKIE['buyer']) ? $_COOKIE['buyer'] : '';
$fbclid = isset($_COOKIE['fbclid']) ? $_COOKIE['fbclid'] : '';
$acc = isset($_COOKIE['acc']) ? $_COOKIE['acc'] : '';

$silent = 0;
$user_ip = '';
$duplicate = '';


// Get Current User IP Address
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $user_ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $user_ip = $_SERVER['REMOTE_ADDR'];
}



if (empty($user_ip)) {
   $silent = 1;
}

$response = array('success' => false, 'errors' => array(), 'silent' => 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
   // Getting data from the form
   $userName = isset($_POST['name']) ? $_POST['name'] : '';
   $userPhone = isset($_POST['phone']) ? formatPhoneNumber($_POST['phone']) : '';
   $userEmail = isset($_POST['email']) ? $_POST['email'] : '';

   /*
   * Check fraudulent IPs
   */
   // Array of exact fraudulent IPs
   $exactFraudIPs = [
      '188.130.158.140',
      '217.76.14.36',
      '195.8.50.67',
      '2.73.49.15',
      '82.194.26.61',
      '95.214.211.51'
   ];

   // Array of partial fraudulent IP patterns
   $partialFraudIPs = [
       '^176\.64\.',   // Partial IP pattern
       '^85\.117\.'   // Another partial IP pattern
   ];

   // Check if the IP address is fraudulent
   if (in_array($user_ip, $exactFraudIPs)) {
       $silent = 1;
   } else {
       foreach ($partialFraudIPs as $fraudIP) {
           if (preg_match("/$fraudIP/", $user_ip)) {
               $silent = 1;
               break; // Exit the loop once a match is found
           }
       }
   }


   /*
   * Check fraudulent phones
   */
   // Array of fraudulent phone numbers
   $fraudNumbers = [
      '77011234567',
      '770112345',
      '777755375121',
      '998998942582568',
      '37437477152577',
      '77754057505',
      '777074876830',
      '777785558213',
      '9981201399',
      '77474098413',
      '777770286970',
      '77078322624',
      '552958266',
      '998998906658',
      '998975033243',
      '9989437373',
      '77123456',
      '37477123456',
      '37499236584',
      '093410897',
      '7093410897',
      '994504556226'
   ];

   // Check if the phone number is fraudulent
   foreach ($fraudNumbers as $fraudNumber) {
       if ($userPhone === $fraudNumber || preg_match("/$fraudNumber/", $userPhone)) {
           $silent = 1;
           break; // Exit the loop once a match is found
       }
   }


   // Check if the fields are filled in
   if (isset($_POST['name'])) {
      if (empty($userName)) {
         $response['errors']['name'] = 'Поле обязательно для заполнения';
      }
   }
   if (isset($_POST['phone'])) {
      if (empty($userPhone)) {
         $response['errors']['phone'] = 'Поле обязательно для заполнения';
      }
   }
   if (isset($_POST['email'])) {
      if (empty($userEmail)) {
         $response['errors']['email'] = 'Поле обязательно для заполнения';
      }
   }

   // If there are errors, we return them
   if (!empty($response['errors'])) {
      echo json_encode($response);
      exit;
   }

   writeLog('User IP: ' . $user_ip . '. User phone: ' . $userPhone . 'GEO: ' . $geo);

   /*
   * Add user to the CRM
   */
   if ($silent !== 1) {

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://finma.cc/http_post.php');

      // Set the HTTP headers
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         "Rest-Key: xYit1q59GQ7uj7D5csfZV",
         "Content-Type: application/json"
      ));


      // Set the request method to POST
      curl_setopt($ch, CURLOPT_POST, 1);

      $postData = [
         'name' => $userName,
         'email' => $userEmail,
         'country' => $geo,
         'phone' => $userPhone,
         'level_id' => '9', // FTD
         'buyer' => $buyer,
         'source' => $source,
         'landing' => 'Комитет',
         'kreo' => $kreo,
         'coment' => '',
      ];

      // Attach the POST data to the request
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

      // Set it to return the transfer as a string
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      // Execute the cURL session
      $curl_response = curl_exec($ch);
      $response['curl'] = $curl_response;

      // Check for cURL errors
      if ($curl_response === false || $curl_response != 'new') {

         $status = 'SPAM';
         $silent = 1;
         $duplicate = '. Duplicate';
         writeLog('The user is duplicate. CRM response: ' . $curl_response . ' (' . $user_ip . ')');

      }else {


         $keitaroUrl = "http://92.113.31.141/ee58f73/postback?subid=$subid&status=sale&sub_id_1=$buyer&sub_id_2=$pxCookie&sub_id_3=komitet&sub_id_4=$source&sub_id_5=$kreo&sub_id_6=$fbclid";
         $keitaroResponse = file_get_contents($keitaroUrl);


          // Facebook Conversion
         include './inc/curl-class.php';

         $timestamp = time();
         $fbc = "fb.1." . $timestamp . "." . $fbclid;

         $submitJson = '{
            "data": [
               {
                  "event_name": "Lead",
                  "event_time": ' . $timestamp . ',
                  "event_id": "per_' . $timestamp . '",
                  "action_source": "website",
                  "user_data": {
                     "fbc": "' . $fbc . '",
                     "client_ip_address": "' . $user_ip . '",
                     "client_user_agent": "' . $_SERVER['HTTP_USER_AGENT'] . '"
                  },
                  "custom_data": {
                     "currency": "USD",
                     "value": "0.01"
                  }
               }
            ]
         }';

         // Set the Facebook Conversions API URL
         $fb_url = "https://graph.facebook.com/v22.0/" . $pxCookie . "/events";


         // Use cURL to send the POST request
         // include './inc/objects/curl.class.php';
         $_curl_ = new CurlServer();
         // $fb_response = $_curl_->post_request($fb_url, $submitJson);
         $fb_response = [];

         $status = 0;

         if (isset($fb_response->events_received)) {
             
             $status = $fb_response->events_received;

         } else {

             $status = "Error";

             if (isset($fb_response->error->error_user_msg)) {
                 $status = $fb_response->error->error_user_msg;
             }else {
                 $status = $fb_response->error->message;
             }

         }


         // Write Log
         writeLog('The user is new in CRM (' . $user_ip . ')');
         writeLog('Params (subid: ' . $subid . ' kreo: ' . $kreo . ' pxCookie: ' . $pxCookie . ' source: ' . $source . ')');
         writeLog('FB (event_time: ' . $timestamp . ' fbc: ' . $fbc . ' client_ip_address: ' . $user_ip . ' client_user_agent: ' . $_SERVER['HTTP_USER_AGENT'] . ' + currency. facebook status: ' . $status . ')');


      }


      // Close the cURL session
      curl_close($ch);

   } else {
      writeLog('Silent: 1 (' . $user_ip . ')');
   }


   if ($silent !== 0) {
      unset($_COOKIE['pxCookie']);
      setcookie('pxCookie', '1173156123642785', time() + 3600 * 24 * 30, '/');
   }



   // Create an array with data
   $formData = array(
      'user_name' => $userName,
      'user_phone' => $userPhone,
      'user_email' => $userEmail,
      'timestamp' => date('Y-m-d H:i:s'),
      'comment' => " IP: " . $user_ip . " silent: " . $silent . $duplicate,
      'country' => $geo,
      'Buyer' => $buyer,
      'fb_status' => $status,
   );

   $jsonFile = 'form-data.json';

   // Read existing data from JSON file
   if (file_exists($jsonFile)) {
      $currentData = json_decode(file_get_contents($jsonFile), true);
   } else {
      $currentData = array();
   }

   // Adding new data
   $currentData[] = $formData;

   if (file_put_contents($jsonFile, json_encode($currentData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
      // Create a new Excel document
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();

      // Set column headings
      $sheet->setCellValue('A1', 'Имя');
      $sheet->setCellValue('B1', 'Номер телефона');
      $sheet->setCellValue('C1', 'Email');
      $sheet->setCellValue('D1', 'Время отправки');
      $sheet->setCellValue('E1', 'comment');
      $sheet->setCellValue('F1', 'Buyer');
      $sheet->setCellValue('G1', 'ФБ статус');

      // Set the width of the columns
      $sheet->getColumnDimension('A')->setWidth(20);
      $sheet->getColumnDimension('B')->setWidth(30);
      $sheet->getColumnDimension('C')->setWidth(30);
      $sheet->getColumnDimension('D')->setWidth(30);
      $sheet->getColumnDimension('E')->setWidth(30);
      $sheet->getColumnDimension('F')->setWidth(30);
      $sheet->getColumnDimension('G')->setWidth(30);

      // Fill in the data in the table
      $rowNum = 2;
      foreach ($currentData as $row) {
         $sheet->setCellValueExplicit('A' . $rowNum, $row['user_name'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         $sheet->setCellValueExplicit('B' . $rowNum, $row['user_phone'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         $sheet->setCellValueExplicit('C' . $rowNum, $row['user_email'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         $sheet->setCellValueExplicit('D' . $rowNum, $row['timestamp'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         if (!empty($row['comment'])) {
            $sheet->setCellValueExplicit('E' . $rowNum, $row['comment'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         if (!empty($row['Buyer'])) {
            $sheet->setCellValueExplicit('F' . $rowNum, $row['Buyer'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         if (!empty($row['fb_status'])) {
            $sheet->setCellValueExplicit('G' . $rowNum, $row['fb_status'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         $rowNum++;
      }

      // Save the Excel file
      $writer = new Xlsx($spreadsheet);
      $excelFile = __DIR__ . '/form-data.xlsx';

      try {
         $writer->save($excelFile);
         $response['success'] = true;
         $response['message'] = 'Файл успешно сохранен.';
      } catch (Exception $e) {
         $response['message'] = 'Ошибка при сохранении Excel-файла: ' . $e->getMessage();
      }



   } else {
      $response['message'] = 'Не удалось сохранить данные в JSON-файл.';
   }





} else {
   $response['message'] = 'Неверный метод запроса.';
}

echo json_encode($response);







/*
* Function to format phone number (remove space, dashes, etc)
*/
function formatPhoneNumber($phoneNumber) {
    // Use preg_replace to remove everything except numbers
    $formattedNumber = preg_replace('/[^\d]/', '', $phoneNumber);
    return $formattedNumber;
}


/*
* Function to write logs into a file
*/
function writeLog($message) {
   // Define the file path for the log
   $logFile = 'log.txt';
   
   // Get the current timestamp
   $timestamp = date("Y-m-d H:i:s");
   
   // Format the log message
   $logMessage = "[" . $timestamp . "] " . $message . PHP_EOL;
   
   // Write the log message to the file
   file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
}