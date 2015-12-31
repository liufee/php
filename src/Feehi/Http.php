<?php 

/*
* @author liufee <job@feehi.com>
* @link http://blog.feehi.com
* @description http request class
**/

namespace Feehi;

use Feehi\lib\Http\HttpBase;

class Http extends HttpBase
{
    /*
    *config with http request,
    *example: new Http(['userAgent'=>'custom','headers'=['Authorize Basic: xxxxxxxx']]);
    *all config params can setting: proxy, cacert, userAgent, headers, connectTimeout, timeout, encoding, ssl_verifier
    **/
    public function __construct( array $config = [] ){
        foreach ($config as $key => $value) {
            $this->$key = $value;
        }
    }

    /*
    *@description get request
    *returns return a array, such as, ['code'=>200, 'headers'=>['xxx'=>'yyy'], 'body'=>'<html........']
    *@params $url string
    *@params $params array the params of get request,such as ['page'=>1,'type'=>'article']
    **/
    public function get( $url , array $params = [] )
    {
        return $this->request( $url, $params, 'get' );
    } 
    
	/*
    *@description post request
    *returns return a array, such as, ['code'=>200, 'headers'=>['xxx'=>'yyy'], 'body'=>'<html........']
    *@params $url string
    *@params $params array or string, the params of post request,such as ['page'=>1,'type'=>'article']
    **/
    public function post( $url, $params = [] )
    {
        return $this->request( $url, $params, 'post' );
    }
}
