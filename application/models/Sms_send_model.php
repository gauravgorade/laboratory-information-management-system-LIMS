<?php
class Sms_send_model extends CI_Model
{
    
    function __construct()
    {  
        parent::__construct();   
    }
    
    
    public  function sendmsg($mobile, $message)
    {
        $clientid = '6209cd73-4b7e-4bd8-82b1-f63cb28a51e7';
        $apikey = '98ef07d8-84e7-44f5-b0cd-62859275db26';
        $msisdn = $mobile;
        $sid = 'SNCSMS';
        $msg = $message;  $fl = 0;   $gwid = 2;
        
        //set POST variables
        $url = 'http://sms.crelite.in/vendorsms/pushsms.aspx?';
        
        $fields = array(
            'clientid'=>$clientid,
            'apikey'=>$apikey,
            'msisdn'=>$msisdn,
            'sid' =>$sid,
            'msg'=>urlencode($msg),
            'fl'=>$fl,
            'gwid'=>$gwid
        );
        
        
        $fields_string = '';
        
        //url-ify the data for the POST
        foreach($fields as $key=>$value)
        {
            $fields_string .= $key.'='.$value.'&';
        }
        
        rtrim($fields_string,'&');
        
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
        
        //execute post
        $result = curl_exec($ch);
        
        //close connection
        curl_close($ch);
        
        
    }
    
    

}
    