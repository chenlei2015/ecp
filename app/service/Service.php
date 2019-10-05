<?php
namespace App\service;

class Service {
    public function  curl_get($url){
        $ch = curl_init();
        curl_setopt_array($ch,[
            CURLOPT_URL =>$url,    //请求的url
            CURLOPT_RETURNTRANSFER =>1,  //不要把请求的结果直接输出到屏幕上
            CURLOPT_CUSTOMREQUEST=>'GET',
            CURLOPT_TIMEOUT =>30,        //请求超时设置
            CURLOPT_SSL_VERIFYPEER=>0,   //服务端不验证ssl证书
            CURLOPT_SSL_VERIFYHOST=>0,   //服务端不验证ssl证书
            CURLOPT_HTTPPROXYTUNNEL=>1,  //启用时会通过HTTP代理来传输
            //CURLOPT_HTTPHEADER =>['Content-type:text/html;charset=utf-8'],//请求头部设置
        ]);
        $content = curl_exec($ch);  //执行
        $err = curl_error($ch);
        curl_close($ch);
        if($err) {
            return $err;
        }
        $result = explode('=',$content);
        return explode(',',trim($result[1],',;"'));
    }
}