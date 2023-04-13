<?php
   /** Get all leads with a limit of 500 results */
   $limit = 10000;                                                                         
   $offset = 0;                                                                          
                                                                                  
   $method = 'getLeads';                                                                 
   $params = array('where' => array(), 'limit' => $limit, 'offset' => $offset);          
   $requestID = session_id();       
   $accountID = '44BBEA9AE56AF028F24263B43F24A211';
   $secretKey = '7D11866DE5C50F63FE22880F21523A1F';                                                     
   $data = array(                                                                                
       'method' => $method,                                                                      
       'params' => $params,                                                                      
       'id' => $requestID,                                                                       
   );                                                                                            
                                                                                                 
   $queryString = http_build_query(array('accountID' => $accountID, 'secretKey' => $secretKey)); 
   $url = "http://api.sharpspring.com/pubapi/v1/?$queryString";                             
                                                                                                 
   $data = json_encode($data);                                                                   
   $ch = curl_init($url);                                                                        
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                              
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                  
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                               
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                   
       'Content-Type: application/json',                                                         
       'Content-Length: ' . strlen($data),
       'Expect: '                                                        
   ));                                                                                           
                                                                                                 
   $result = curl_exec($ch);                                                                     
   curl_close($ch);                                                                              
   $manage = json_decode($result,true); 

   //print_r($manage); 

   if (($id = fopen('datafile.txt', 'wb'))) {
    fwrite($id, json_encode($manage));
    fclose($id);
}          
  
?>

