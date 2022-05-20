<?php
    require_once("connection.php");
    $id= $_GET["id"];
    $sql = "SELECT * FROM erth where id = '".$id."'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);

    $address_data1 = array();
    
    $address_data1['FactoryName']=  $data["FactoryName"];
    $address_data1['FAddress']=  $data["FAddress"];
    $address_data1['FCity']=  $data["FCity"];
    $address_data1['FState']=  $data["FState"];
    $address_data1['FCountry']=  $data["FCountry"];
    $address_data1['StyleDes']=  $data["StyleDes"];
    $address_data1['Class']=  $data["Class"];

    $address_data2 = array();
    $address_data2['FactoryName']=  $data["FactoryName"];
    $address_data2['FAddress']=  $data["FAddress1"];
    $address_data2['FCity']=  $data["FCity"];
    $address_data2['FState']=  $data["FState"];
    $address_data2['FCountry']=  $data["FCountry"];
    $address_data2['StyleDes']=  $data["StyleDes"];
    $address_data2['Class']=  $data["Class"];
        
    $address_data3 = array();
    $address_data3['FactoryName']=  $data["FactoryName"];
    $address_data3['FAddress']=  $data["FAddress2"];
    $address_data3['FCity']=  $data["FCity"];
    $address_data3['FState']=  $data["FState"];
    $address_data3['FCountry']=  $data["FCountry"];
    $address_data3['StyleDes']=  $data["StyleDes"];
    $address_data3['Class']=  $data["Class"];

    $address_data4 = array();
    $address_data4['Name']=  $data["VendorName"];
    $address_data4['FAddress']=  $data["Address"];
    $address_data4['FCity']=  $data["City"];
    $address_data4['FState']=  $data["State"];
    $address_data4['FCountry']=  $data["Country"];


    $address_data = $home_data = array();

    foreach(array($address_data1,$address_data2,$address_data3, $address_data4) as $key => $data){

       
        if(!empty($data["FAddress"])){
            $Faddress = $data["FAddress"].",".$data["FCity"].",".$data["FState"].",".$data["FCountry"];

            $url = "https://maps.google.com/maps/api/geocode/json?key=AIzaSyDsxMz3A2KjmikJ3yKhSak3_HWa_uunVIE&address=".urlencode($Faddress);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
            $responseJson = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($responseJson);
            if ($response->status == 'OK') {

                if(isset($data["Name"])){
                    
                    $home_data["Name"] = $data["Name"];
                    $home_data["Address"] = $data["FAddress"];
                    $home_data["City"] = $data["FCity"];
                    $home_data["State"] = $data["FState"];
                    $home_data["title"] = $data["FCountry"];
                    $home_data['lat']=  $response->results[0]->geometry->location->lat;
                    $home_data['lng']=  $response->results[0]->geometry->location->lng;
                    $HDataArr[]=  $home_data;

                }

                if(isset($data["FactoryName"])){
                    
                    $address_data['FactoryName']=  $data["FactoryName"];
                    $address_data['FAddress']=  $data["FAddress"];
                    $address_data['FCity']=  $data["FCity"];
                    $address_data['FState']=  $data["FState"];
                    $address_data['FCountry']=  $data["FCountry"];
                    $address_data['StyleDes']=  $data["StyleDes"];
                    $address_data['Class']=  $data["Class"];
                    $address_data['flag']= "http://maps.google.co.uk/intl/en_ALL/mapfiles/ms/micons/green-dot.png";
                    $address_data['lat']=  $response->results[0]->geometry->location->lat;
                    $address_data['lng']=  $response->results[0]->geometry->location->lng;
                    $FDataArr[]=  $address_data;

                }
        
            } else {
                //echo $response->status;
            }
           
        }

    }

    $FData = json_encode($FDataArr);
    $HData = json_encode($HDataArr);

?>