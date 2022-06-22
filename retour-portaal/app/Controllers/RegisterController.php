<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RegisterController extends BaseController
{
    public function index()
    {
        //
    }

    public function googleCaptachStore()
    {

        if (isset($_POST['g-recaptcha-response'])) {
            $captcha = $_POST['g-recaptcha-response'];
        } else {
            $captcha = false;
        }

        $session = session();

        if (!$captcha) {
            $session->setFlashdata('msg', 'connection failed');
            return redirect()->to('Home');
        } else {
            $secret   = env('RECAPTCHAV2_SECRET');
            $response = file_get_contents(
                "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
            );
            // use json_decode to extract json response
            $response = json_decode($response);

            if ($response->success === false) {
                $session->setFlashdata('msg', json_encode($response['error-codes']));
                return redirect()->to('Home');

            }
        }

//... The Captcha is valid you can continue with the rest of your code
//... Add code to filter access using $response . score
        if ($response->success==true && $response->score <= 0.5) {
            $session->setFlashdata('msg', json_encode($response['error-codes']));
            return redirect()->to('Home');

        }



//            $verify = curl_init();
//            curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
//            curl_setopt($verify, CURLOPT_POST, true);
//            curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
//            curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
//            curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
//            $response = curl_exec($verify);
//
//            $status = json_decode($response, true);
//
//            $session = session();
//
//            if ($status['success']) {
//
//                $session->setFlashdata('msg', 'Form has been successfully submitted');
//                return redirect()->to('Home/product');
//
//            } else {
//
//                $session->setFlashdata('msg', json_encode($status['error-codes']));
//                return redirect()->to('Home');
//
//            }
//
//        }else{
//            $session = session();
//
//            $session->setFlashdata('msg', 'connection failed');
//            return redirect()->to('Home');
//
//        }

        }

}
