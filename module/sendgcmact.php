<?php 


    $queryProduct = "SELECT * FROM dcm where id_user = 7";
    $dataProduct = queryData($queryProduct);
    while ($row = mysqli_fetch_array($dataProduct)) {

      $gcm_array[]=$row['token'];
    }
         $url = 'https://android.googleapis.com/gcm/send';
   
    $message = array
        (
                'message'       => 'Ini message nya',
                'title'         => 'Ini Title nya',
                'subtitle'      => 'Ini Subtitle nya',
                'tickerText'    => 'Ini Tickertext nya',
                'vibrate'       => 1,
                'sound'         => 'default',
                'largeIcon'     => 'large_icon',
                'smallIcon'     => 'small_icon'
        );
         $fields = array(
             'registration_ids' => $gcm_array,
             'data' => $message,
         );
   
         $headers = array(
             'Authorization: key=AIzaSyBevDcXyMH4gwGeQtHhlGWL82WeE68zZ-8',
             'Content-Type: application/json'
         );
         // Open connection
         $ch = curl_init();
   
         // Set the url, number of POST vars, POST data
         curl_setopt($ch, CURLOPT_URL, $url);
   
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   
         // Disabling SSL Certificate support temporarly
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   
         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
   
         // Execute post
         $result = curl_exec($ch);
         if ($result === FALSE) {
             die('Curl failed: ' . curl_error($ch));
         }
   
         // Close connection
         curl_close($ch);
         echo $result;

 ?>