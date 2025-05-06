
<?php
$mobile=$_GET['m'];
$curl = curl_init();
	   
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2?authorization=c0WugMtQzA3lLrIqDQGOWE9WQ2XW4qiGDtr4emXk9GnQ8vyT1jQ1H17B4ApR&message=".urlencode('your complaint is completed')."&language=english&route=q&numbers=".urlencode("7411344659"),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
	"cache-control: no-cache"
  ),
));

$response = curl_exec($curl);

?>
