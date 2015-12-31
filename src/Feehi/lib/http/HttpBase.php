<?php 

namespace Feehi\lib\http;

class HttpBase
{
    
    protected $proxy;
    protected $cacert;
    protected $userAgent = 'Feehi';
    protected $headers = [];
    protected $connectTimeout = 30;
    protected $timeout = 30;
    protected $encoding = 'gzip,deflate';
    protected $ssl_verifypeer = false;


    protected function request( $url, $params = '', $type = 'get' )
    {
        $ci = curl_init();
		if( !empty( $this->proxy ) ) curl_setopt( $ci , CURLOPT_PROXY , $this->proxy );
        if( !empty( $this->cacert ) ) curl_setopt( $ci , CURLOPT_PROXY , $this->cacert );
        curl_setopt( $ci , CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ci , CURLOPT_USERAGENT , $this->userAgent );
        curl_setopt( $ci , CURLOPT_HTTPHEADER , $this->headers );
        curl_setopt( $ci , CURLOPT_CONNECTTIMEOUT , $this->connectTimeout);
        curl_setopt( $ci , CURLOPT_TIMEOUT , $this->timeout );
        curl_setopt( $ci , CURLOPT_RETURNTRANSFER , TRUE );
        curl_setopt( $ci , CURLOPT_ENCODING , $this->encoding );
        curl_setopt( $ci , CURLOPT_SSL_VERIFYPEER , $this->ssl_verifypeer );  
        curl_setopt( $ci , CURLOPT_SSL_VERIFYHOST , 2 );    
        //curl_setopt( $ci , CURLOPT_SSL_VERIFYHOST , 1 );//if php version lower than 5.4.0 , please use this one
        //curl_setopt( $ci , CURLOPT_HEADERFUNCTION ,  [$this , 'getHeader'] );
        curl_setopt( $ci , CURLOPT_HEADER , TRUE );
        if( $type == 'post' ){
            curl_setopt( $ci , CURLOPT_POST , TRUE );
            if( !empty( $params ) && is_array( $params ) ) 
                $postfields = http_build_query( $params );
            else
                $postfields = $params;
            curl_setopt( $ci , CURLOPT_POSTFIELDS , $postfields );
        }else{
            $url .= '?'.http_build_query( $params );
        }
        curl_setopt( $ci , CURLOPT_URL , $url );
        curl_setopt( $ci , CURLINFO_HEADER_OUT , TRUE );
        $response = curl_exec( $ci );
        $return['code'] = curl_getinfo($ci, CURLINFO_HTTP_CODE);
        if ($return['code'] == '200') {
            $headerSize = curl_getinfo($ci, CURLINFO_HEADER_SIZE);
            $headers = substr($response, 0, $headerSize);
            $temp = explode("\r\n", $headers);
            unset($temp[0]);
            $return['headers'] = [];
            foreach ($temp as $key => $value) {
                if( empty($value) ) continue;
                $arr = explode(':', $value);
                $return['headers'][$arr[0]] = trim($arr[1]);
            }
            $return['body'] = substr($response, $headerSize);
        }
        return $return;
     } 

}
