<?php

include 'connection.php';

if(preg_match('/\s/',$_POST['first_name'])){
    $name = explode(' ',$_POST['first_name']);
    $first_name = $name[0];
    $last_name = $name[1];
}
else{
    $first_name = $_POST['first_name'];
    $last_name = '';
}
 $med_care = mysqli_real_escape_string($conn, $_POST['med_care']);
 $bd_month = mysqli_real_escape_string($conn, $_POST['bd_month']);
 $bd_day = mysqli_real_escape_string($conn, $_POST['bd_day']);
 $bd_year = mysqli_real_escape_string($conn, $_POST['bd_year']);
 $address = mysqli_real_escape_string($conn, $_POST['address']);
 $zip_code = mysqli_real_escape_string($conn, $_POST['zip_code']);
 $country = mysqli_real_escape_string($conn, $_POST['country']);
 $state = mysqli_real_escape_string($conn, $_POST['state']);
 $city = mysqli_real_escape_string($conn, $_POST['city']);
 $phone = mysqli_real_escape_string($conn, $_POST['phone']);
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 $s1_id = mysqli_real_escape_string($conn, $_POST['s1_id']);
 $s2_id = mysqli_real_escape_string($conn, $_POST['s2_id']);
 $s3_id = mysqli_real_escape_string($conn, $_POST['s3_id']);
 $s4_id = mysqli_real_escape_string($conn, $_POST['s4_id']);
 $s5_id = mysqli_real_escape_string($conn, $_POST['s5_id']);
 $transaction_id = mysqli_real_escape_string($conn, $_POST['transaction_id']);
 $aff_id = mysqli_real_escape_string($conn, $_POST['aff_id']);
 $off_id = mysqli_real_escape_string($conn, $_POST['off_id']);

 if(isset($_POST['med_care']) == 1){
    $currently_enrolled = 'Yes';
}
else{
    $currently_enrolled = 'No';
}

$sql = "INSERT INTO `questionare`(`med_care`, `bd_month`, `bd_day`, `bd_year`, `zip_code`, `country`, `state`, `city`, `email`, `phone`, `first_name`, `last_name`, `address`, `s1_id`, `s2_id`, `s3_id`, `s4_id`, `s5_id`, `transaction_id`, `aff_id`, `off_id`)
                VALUES ('{$currently_enrolled}','{$bd_month}','{$bd_day}','{$bd_year}','{$zip_code}','{$country}','{$state}','{$city}','{$email}','{$phone}','{$first_name}','{$last_name}','{$address}','{$s1_id}','{$s2_id}','{$s3_id}','{$s4_id}','{$s5_id}','{$transaction_id}','{$aff_id}','{$off_id}')";

if(mysqli_query($conn, $sql)){


    $dob = strval($bd_year).'-'.strval($bd_month).'-'.strval($bd_day);
$today = date("Y-m-d");
$diff = date_diff(date_create($dob), date_create($today));
$age = $diff->format('%y');

    $postRequest = [
        "lp_campaign_id"=>"63c5b3da19919",
        "lp_campaign_key"=>"xKfk6XnCW8v3rwhRqmPT",
        "first_name" => $first_name,
        "last_name" => $last_name ?? null,
        "Ip_response" => "JSON",
        "lp_s1" => $s1_id,
        "lp_s2" => $s2_id,
        "lp_s3" => $s3_id,
        "lp_s4" => $s4_id,
        "lp_s5" => $s5_id,
        "transaction_id" => $transaction_id,
        "affiliate_id" => $aff_id,
        "dob" => $dob,
        "address" => $address,
        "phone_home" => $phone,
        "zip_code" => $zip_code,
        "country" => $country,
        "state" => $state,
        "city" => $city,
        "email_address" => $email,
        "currently_enrolled" => $currently_enrolled,
];
    
    $cURLConnection = curl_init('https://rubicon.leadspediatrack.com/post.do');
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    
    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    
    // $apiResponse - available data from the API request

  if($apiResponse){
      header("location: ../thankyou.php?transaction_id=".$transaction_id."&sub1=".$s1_id."&sub2=".$s2_id."&sub3=".$s3_id."&sub4=".$s4_id."&sub5=".$s5_id. "&affid=".$aff_id . "offid=".$off_id. "&zip_code=".$zip_code."&age=".$age);
  }

}


?>
