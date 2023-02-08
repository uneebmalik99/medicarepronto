<?php

include 'connection.php';

if(preg_match('/\s/',$_POST['name'])){
    $name = explode(' ',$_POST['name']);
    $first_name = $name[0];
    $last_name = $name[1];
}
else{
    $first_name = $_POST['name'];
    $last_name = '';
}

if(isset($_POST['med_care']) == 1){
    $currently_enrolled = 'Yes';
}
else{
    $currently_enrolled = 'No';
}





$bd_class = mysqli_real_escape_string($conn, $_POST['bd_class']);

$med_care = mysqli_real_escape_string($conn, $_POST['med_care']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$s1_id = mysqli_real_escape_string($conn, $_POST['s1_id']);
 $s2_id = mysqli_real_escape_string($conn, $_POST['s2_id']);
 $s3_id = mysqli_real_escape_string($conn, $_POST['s3_id']);
 $s4_id = mysqli_real_escape_string($conn, $_POST['s4_id']);
 $s5_id = mysqli_real_escape_string($conn, $_POST['s5_id']);
 $transaction_id = mysqli_real_escape_string($conn, $_POST['transaction_id']);
 $aff_id = mysqli_real_escape_string($conn, $_POST['aff_id']);
 $off_id = mysqli_real_escape_string($conn, $_POST['off_id']);


$sql1 = "INSERT INTO `questionnaire_v1`(`med_care`, `bd_class`, `name`, `last_name`, `email`, `phone`, `s1_id`, `s2_id`, `s3_id`, `s4_id`, `s5_id`, `transaction_id`, `aff_id`, `off_id`) 
VALUES ('{$med_care}','{$bd_class}','{$first_name}','{$last_name}','{$email}','{$phone}','{$s1_id}','{$s2_id}','{$s3_id}','{$s4_id}','{$s5_id}','{$transaction_id}','{$aff_id}','{$off_id}')";
$run_query = mysqli_query($conn, $sql1) or die('Error executing');
if($run_query){

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
            "phone_home" => $phone,
            "email_address" => $email,
			"currently_enrolled" => $currently_enrolled ,
];
    
    $cURLConnection = curl_init('https://rubicon.leadspediatrack.com/post.do');
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    
    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);
    
    // $apiResponse - available data from the API request

  if($apiResponse){
      header("location: ../thankyou.php?transaction_id=".$transaction_id."&sub1=".$s1_id."&sub2=".$s2_id."&sub3=".$s3_id."&sub4=".$s4_id."&sub5=".$s5_id. "&affid=".$aff_id . "offid=".$off_id);
  }

}



?>