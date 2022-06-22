<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client as Http;

class ReturnModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'returns';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAuth()
    {
        $salt = uniqid();
        $timestamp = time();
        $shopId = 45;
        $apiKey = getenv('API_KEY');
        return [
            'shopid' => $shopId,
            'timestamp' => $timestamp,
            'salt' => $salt,
            'token' => hash_hmac('sha512', $shopId . $apiKey . $timestamp . $salt, $apiKey)
        ];
    }

    public function getApi($data, $url ,$cleaned = true){

        $client = new Http([
            'base_uri' => "http://localhost:8000/api/",
            'http_errors' => false
        ]);

        $response = $client->post( $url,[
            'form_params' => [
                'auth' => json_encode($this->getAuth()),
                'data' => json_encode($data)
            ]
        ]);

        //            $client = new \GuzzleHttp\Client(['verify' => false]);


        $data = json_decode((string)$response->getBody(), true);

        if($cleaned == true){
            return $data;
        }else{
            return $response;
        }
    }

    public function getApiV2($data, $url ,$cleaned = true){

        $client = new Http([
            'base_uri' => "http://localhost:8000/api/",
            'http_errors' => false
        ]);

        $response = $client->post( $url,[
            'form_params' => [
                'auth' => json_encode($this->getAuth()),
                'data' => json_encode($data)
            ]
        ]);

        //            $client = new \GuzzleHttp\Client(['verify' => false]);


        $data = json_decode((string)$response->getBody(), true);

        if($cleaned == true){
            return $data;
        }else{
            return $response;
        }
    }

    public function setApi($data, $url){
        $uri = 'http://localhost:8000/api/'. $url;

        $curl = curl_init($uri);
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            'Content-Type' => 'application/json',
        );

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $curl_data = [
            'auth' => json_encode($this->getAuth()),
            'data' => json_encode($data)
        ];

        curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_data);

//            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
//        $response = curl_getinfo($curl);
//        $test2 = curl_errno($curl);
//        $test3 = curl_error($curl);
        curl_close($curl);

        return $response;
    }
}
