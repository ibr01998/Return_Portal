<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use GuzzleHttp\Client as Http;

class Preview extends BaseController
{
    protected function getAuth()
    {
        $salt = uniqid();
        $timestamp = time();
        $shopId = 45;
        $apiKey = 'j4oVecpwKcUat7nya3WvmmkMXUiu9NoF2lLxUJCP8jjjxsujBDjdsLrsQWDJ/2VNs355mKgpcfeDOhV7wRXviw==';
        return [
            'shopid' => $shopId,
            'timestamp' => $timestamp,
            'salt' => $salt,
            'token' => hash_hmac('sha512', $shopId . $apiKey . $timestamp . $salt, $apiKey)
        ];
    }

    public function index($background=null, $logo=null, $color=null, $text=null)
    {
        if(!empty($text)){
            $text = base64_decode($text);
            $text = json_decode($text);
            $lang = $_SESSION['lang'] ?? $this->request->getLocale();

            if($text == ' '){
               $text = null;
            }
        }
        if(!empty($color)){
            $color = base64_decode($color);

            if($color == ' '){
                $color = null;
            }
        }
        if(!empty($logo)){
            $logo = base64_decode($logo);

            if ($logo == ' '){
                $logo = null;
            }
        }
        if(!empty($background)){
            $background = base64_decode($background);

            if($background == ' '){
                $background = null;
            }
        }

            echo view('navbar', ['logo' => $logo, 'background' => $background]);
            echo view('preview', ['color' => $color, 'text' => $text->$lang]);
    }

}
