<?php
class Curler
{
    function curl_local_request($date, $data)
    {
        global $curl_elements, $json, $service_elements;
        
        $ch = curl_init();
        $params=["data"=>$data, "currentDate"=>$date];
        
        //DEBUG
        //$json->JEO($curl_elements['URL'].$service_elements['SRV'].$service_elements['SRV_fix']);
        
        $defaults = array(
            CURLOPT_URL => $curl_elements['URL'].$service_elements['SRV'].$service_elements['SRV_fix'],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false
        );
        curl_setopt_array($ch, $defaults);
        $result = curl_exec($ch);
        //$json->JEO(curl_error($ch));
        curl_close($ch);
        echo $result;
        return;
    }
    
    function curl_external_get_request($URL)
    {
        global $curl_elements, $json, $service_elements;
        $ch = curl_init();
        $params=$data;
        
        $defaults = array(
            CURLOPT_URL => $URL,
            CURLOPT_POST => false,
            CURLOPT_RETURNTRANSFER => true,
        );
        
        $customHeaders = array(
			'Accept: application/json'
		);
 
		curl_setopt($ch, CURLOPT_HTTPHEADER, $customHeaders);
        curl_setopt_array($ch, $defaults);
        
        $result = curl_exec($ch);
        //$json->JEO(curl_error($ch));
        curl_close($ch);
        return $result;
    }
    
    function curl_external_get_request_data($URL, $data)
    {
        global $curl_elements, $json, $service_elements;
        $ch = curl_init();
        
		curl_setopt($ch, CURLOPT_URL, $URL.'?data/'.$data);
        $defaults = array(
            CURLOPT_POST => false,
            CURLOPT_RETURNTRANSFER => true,
        );
        
        $customHeaders = array(
			'Accept: text/html'
		);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $customHeaders);
        curl_setopt_array($ch, $defaults);
        
        $result = curl_exec($ch);
        //$json->JEO(curl_error($ch));
        curl_close($ch);
        return $result;
    }
    
    function curl_external_post_request($URL, $data)
    {
        global $curl_elements, $json, $service_elements;
        $ch = curl_init();
        $params=["Data"=>$data, "currentDate"=>$date];
        
        $defaults = array(
            CURLOPT_URL => $URL,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 5,
        );
        curl_setopt_array($ch, $defaults);
        $result = curl_exec($ch);
        //$json->JEO(curl_error($ch));
        curl_close($ch);
        return $result;
    }

    function create_settings($url)
    {
        global $curl_elements;
        $curl_elements['URL'] = $url;
        return;
    }
}
?>
