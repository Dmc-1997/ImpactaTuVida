<?php

namespace App\Helpers;

class DigitalOcean {

    CONST URL = "https://api.digitalocean.com/v2/domains/impactatuvida.co";
    CONST SITE_IP = '143.198.71.22';
    CONST TOKEN = 'dop_v1_023343f6a1f6300822c39edf95de9df0ac6f0c3f94e983951f4fc8b061ca37ac';

    public static function createDomainRecord($subdomain)
    {
        $url = self::URL.'/records';
        $ip  = self::SITE_IP;
        $token = self::TOKEN;

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ];
        $parameter = array(
            'type' => 'A',
            'name' => $subdomain,
            'data' => $ip,
            'priority' => null,
            'port' => null,
            'ttl' => 300,
            'weight' => null,
            'flags' => null,
            'tag' => null
        );
        $payload = json_encode($parameter);
        //var_dump($payload);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        $httpcode = curl_getinfo($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //var_dump($httpcode);
        $response = curl_exec($ch);
        //var_dump($response);
        $result = json_decode($response);

        if (isset($result->domain_record->id)) {
            return $result->domain_record->id;
        }

        return 0;
    }

    public static function deleteDomainRecord($domain_record_id)
    {
        $url = self::URL.'/records/'.$domain_record_id;
        $ip  = self::SITE_IP;
        $token = self::TOKEN;

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
        ];
        $parameter = array();
        $payload = json_encode($parameter);
        //var_dump($payload);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_POST, 1);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        $httpcode = curl_getinfo($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $response = curl_exec($ch);

        $result = json_decode($response);


        return 1;

    }

}
