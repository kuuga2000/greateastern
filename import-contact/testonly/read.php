<?php
/*
$Data = simplexml_load_file('data.xml');

foreach ($Data->entry as $data) {
	$dataX[]=$data->xpath('gd:email');
	//echo $data->attributes()->address.'<br>';
}
print_r($dataX);
echo "<br>";
foreach($dataX as $d){
	echo $d->attributes()->email;
}*/
 /*
$Data = simplexml_load_file('data.xml');
$Data->entry->xpath('gd:email');



foreach($Data->entry->xpath('gd:email') as $t){
	echo $t->attributes()->address;
} */
function curl_file_get_contents($url)
{
 $curl = curl_init();
 $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
 
 curl_setopt($curl,CURLOPT_URL,$url);	//The URL to fetch. This can also be set when initializing a session with curl_init().
 curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);	//TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
 curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,5);	//The number of seconds to wait while trying to connect.	
 
 curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);	//The contents of the "User-Agent: " header to be used in a HTTP request.
 curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);	//To follow any "Location: " header that the server sends as part of the HTTP header.
 curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);	//To automatically set the Referer: field in requests where it follows a Location: redirect.
 curl_setopt($curl, CURLOPT_TIMEOUT, 10);	//The maximum number of seconds to allow cURL functions to execute.
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);	//To stop cURL from verifying the peer's certificate.
 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
 
 $contents = curl_exec($curl);
 curl_close($curl);
 return $contents;
}
$xml = curl_file_get_contents('https://www.google.com/m8/feeds/contacts/default/full?max-results=25&oauth_token=ya29.rwAJLDtLd2IKZR5mmvnKxMuT2O4BvzAba1yUnyn6tT_FNdNQjLyGkszE0vMRBmoinIv-2omQXopIrw');
$xml =  new SimpleXMLElement($xml);
$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005/Atom');
$result = $xml->xpath('//gd:email');

foreach ($result as $title) {
  echo $title->attributes()->address . "<br>";
}
?>