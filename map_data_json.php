<?php
    require_once("connection.php");
    $sql = "SELECT * FROM erth";
    $result = mysqli_query($conn, $sql);

    $address_data = array();
    foreach($result as $data){ 
            $address = $data["Address"].",".$data["City"].",".$data["State"].",".$data["Country"];
            $url = "https://maps.google.com/maps/api/geocode/json?key=AIzaSyDsxMz3A2KjmikJ3yKhSak3_HWa_uunVIE&address=".urlencode($address);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
            $responseJson = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($responseJson);
            if ($response->status == 'OK') {
                //$tmp .= "{'".$link."', ". $response->results[0]->geometry->location->lat.", ".$response->results[0]->geometry->location->lng."},";
                //$tmp .= "{'".$link."', ". $response->results[0]->geometry->location->lat.", ".$response->results[0]->geometry->location->lng."},";
                $address_data['Name']=  $data["VendorName"];
                $address_data['City']=  $data["City"];
                $address_data['State']=  $data["State"];
                $address_data['title']=  $data["Country"];
                $address_data['Address']=  $data["Address"];
                $address_data['flag']= "http://maps.google.co.uk/intl/en_ALL/mapfiles/ms/micons/green-dot.png";
                $address_data['lat']=  $response->results[0]->geometry->location->lat;
                $address_data['lng']=  $response->results[0]->geometry->location->lng;
                $address_data1[]=  $address_data;
        
            } else {
                //echo $response->status;
            }
     }
    $array_encode = json_encode($address_data1);
    // echo"<pre>";
    // print_r($array_encode);
    // echo"</pre>";
?>