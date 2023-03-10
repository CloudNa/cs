<?php

namespace addon\printer\data\sdk\yilianyun\oauth;

use addon\printer\data\sdk\yilianyun\config\YlyConfig;
use Exception;
class YlyOauthClient{

    private $clientId;
    private $clientSecret;
    private $tokenUrl;
    private $log;


    public function __construct(YlyConfig $config)
    {
        $this->clientId = $config->getClientId();
        $this->clientSecret = $config->getClientSecret();
        $this->tokenUrl = $config->getRequestUrl() . '/oauth/oauth';
        $this->log = $config->getLog();
    }


    public function getToken($code = '')
    {
        $time = time();
        $params = array(
            'client_id' => $this->clientId,
            'timestamp' => $time,
            'sign' => $this->getSign($time),
            'id' => $this->uuid4(),
            'scope' => 'all'
        );
        $params['grant_type'] = 'client_credentials';
        if (!empty($code)) {
            $params['code'] = $code;
            $params['grant_type'] = 'authorization_code';
        }
        return $this->send($params);
    }


    public function refreshToken($refreshToken)
    {
        $time = time();
        $params = array(
            'client_id' => $this->clientId,
            'timestamp' => $time,
            'sign' => $this->getSign($time),
            'id' => $this->uuid4(),
            'scope' => 'all',
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken,
        );
        return $this->send($params);
    }


    public function getSign($timestamp)
    {
        return md5(
            $this->clientId.
            $timestamp.
            $this->clientSecret
        );
    }


    public function uuid4(){
        mt_srand((double)microtime() * 10000);
        $charid = strtolower(md5(uniqid(rand(), true)));
        $hyphen = '-';
        $uuidV4 =
            substr($charid, 0, 8) . $hyphen .
            substr($charid, 8, 4) . $hyphen .
            substr($charid, 12, 4) . $hyphen .
            substr($charid, 16, 4) . $hyphen .
            substr($charid, 20, 12);
        return $uuidV4;
    }


    public function send($data)
    {
        $requestInfo = http_build_query($data);
        $log = $this->log;
        if ($log != null) {
            $log->info("request data: " . $requestInfo);
        }
        $curl = curl_init(); // ????????????CURL??????
        curl_setopt($curl, CURLOPT_URL, $this->tokenUrl); // ??????????????????
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // ??????????????????????????????
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Expect:'
        )); // ??????????????????????????????
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // ??????????????????
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // ????????????Referer
        curl_setopt($curl, CURLOPT_POST, 1); // ?????????????????????Post??????
        curl_setopt($curl, CURLOPT_POSTFIELDS, $requestInfo); // Post??????????????????
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // ??????????????????????????????
        curl_setopt($curl, CURLOPT_HEADER, 0); // ???????????????Header????????????
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // ??????????????????????????????????????????
        $requestResponse = curl_exec($curl); // ????????????
        $response = json_decode($requestResponse);
        if (curl_errno($curl)) {
            if ($log != null) {
                $log->error("error: " . curl_error($curl));
            }
            throw new Exception(curl_error($curl));
        }
        if (is_null($response)) {
            throw new Exception("illegal response :" . $requestResponse);
        }
        if ($response->error != 0 && $response->error_description != 'success') {
            throw new Exception(json_encode($response));
        }
        if ($this->log != null) {
            $this->log->info("response: " . json_encode($response));
        }
        curl_close($curl); // ??????CURL??????
        return $response->body; // ????????????
    }


}