<?php

namespace App\Controllers;

use App\Models\Customer;
use App\Models\Item;
use App\Models\ReturnModel;
use GuzzleHttp\Client as Http;
use function PHPUnit\Framework\isEmpty;

class Home extends BaseController
{

    public function __construct()
    {
        $this->ReturnModel = new ReturnModel();

    }

    function emailConfig(){

        // Protocol
        $config['protocol'] = getenv('email_config_protocol');
        // Host
        $config['SMTPHost'] = getenv('email_config_SMTPHost');
        // Port
        $config['SMTPPort'] = getenv('email_config_SMTPPort');
        // User
        $config['SMTPUser'] = getenv('email_config_SMTPUser');
        // Pass
        $config['SMTPPass'] = getenv('email_config_SMTPPass');

        return $config;
    }

    public function email($email, $subject ,$body){

        $session = session();

        // initialize email setting from emailConfig function.
        $this->email->initialize($this->emailConfig());
//        dd($this->emailConfig());
        $this->email->setMailType('html');
        // Set sender email and name from .env file
        $this->email->setFrom(getenv('email_config_SMTPUser'), getenv('email_config_senderName'));
        // target email or receiver
        $this->email->setTo($email);
//        dd($email);
        // Email subject
        $this->email->setSubject($subject);

        // Email message
        $this->email->setMessage($body);
        $this->email->send();

        // make sure email is send
        if($this->email->send()){
            $session->setFlashdata('email', 'email send');
            dd('succes');
        }else {
            $session->setFlashdata('email', 'email failed to send');
            dd($this->email);
        }
    }

    public function index()
    {
        clearSessions();
        echo view('navbar');
        echo view('Retourform/validation');
    }

    public function validation($orderid = null, $zipcode = null){

        if ($orderid == null){
            if (isset($_POST['g-recaptcha-response'])) {
                $captcha = $_POST['g-recaptcha-response'];
            } else {
                $captcha = false;
            }
            $session = session();

            if (!$captcha) {
                echo view('navbar');
                echo view('Retourform/validation', ['error' => 'reCaptcha']);
                return;
            } else {
                $secret = env('RECAPTCHAV3_SECRET');
                $response = file_get_contents(
                    "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
                );
                $response = json_decode($response);

                if ($response->success === false) {
                    echo view('navbar');
                    echo view('Retourform/validation', ['error' => 'reCaptcha']);
                    return;
                }else{
                    $session->setFlashdata('msg', 'Google reCaptcha Validation successful');
                }
            }

            if ($response->success==true && $response->score <= 0.5) {
                echo view('navbar');
                echo view('Retourform/validation', ['error' => 'reCaptcha']);
                return;
            }
        }

        if ($orderid == null && !$this->validate([
                'ordernr' => 'required',
                'postcode' => 'required',
            ])) {
            echo view('navbar');
            echo view('Retourform/validation', ['validation' => $this->validator]);
        }else{
            if(isset($_POST['ordernr'])){
                $_SESSION['order_id'] = str_replace(array(' ', 'ORD_', 'ord_'), '', $this->request->getPost('ordernr'));
            }elseif(isset($orderid)){
                $_SESSION['order_id'] = $orderid;
            }

            $data = new \stdClass();
            $data->order_id = $_SESSION['order_id'];

            $response = $this->ReturnModel->getApi($data, 'getOrder', false);

            if ($response->getStatusCode() == 200){
                $data = json_decode((string)$response->getBody(), true);


                if(isset($_POST['postcode'])){
                    $_SESSION['postcode'] = str_replace(' ', '', $this->request->getPost('postcode'));
                }elseif (isset($zipcode)){
                    $_SESSION['postcode'] = $zipcode;
                }

                $_SESSION['customer'] = $data[0]['shipping_address'];

                $_SESSION['email'] = $data[0]['shipping_address']['email'];

                $check_zip = str_replace(' ', '', $data[0]['shipping_address']['zip']);

                if (strtoupper($check_zip) != strtoupper($_SESSION['postcode'])){
                    echo view('navbar');
                    echo view('Retourform/validation', ['error' => 'mismatch']);
                    return;
                }
                if (empty($data[0]['shipped_at']['date'])){
                    echo view('navbar');
                    echo view('Retourform/validation', ['error' => 'shipping_error']);
                }else{

                    $_SESSION['back'] = true;
                    $_SESSION['items'] = $data[0]['items'];
                    $_SESSION['shop_id'] = $data[0]['shop_id'];

                    $get = [
                        'shop_id' => $_SESSION['shop_id']
                    ];

                    $response = $this->ReturnModel->getApi($get, 'getRetourSettings');
                    $_SESSION['settings'] = $response;
                    $_SESSION['settings']['return_reasons'] = json_decode($_SESSION['settings']['return_reasons']);
                    if(strtotime($data[0]['shipped_at']['date']) < strtotime('-'.$_SESSION['settings']['return_day_amount'].' days')){
                        echo view('navbar');
                        echo view('Retourform/validation', ['error' => 'late_error']);
                        return;
                    }

                    if($_SESSION['settings']['return_status'] == true){
                        echo view('navbar', ['logo' => $_SESSION['settings']['return_settings_logo'], 'background' => $_SESSION['settings']['return_settings_background']]);
                        echo view('Retourform/confirmation', ['customer' => $_SESSION['customer'], 'color' => $_SESSION['settings']['return_settings_color']]);
                    }else{
                        echo view('navbar');
                        echo view('Retourform/validation', ['error' => 'disabled']);
                    }
                }
            }else{
                echo view('navbar');
                echo view('Retourform/validation', ['error' => 'ordernr_error']);
            }
        }
    }

    public function Product()
    {
        if(isset($_POST['confirm']))
        {
            $lang = $_SESSION['lang'] ?? $this->request->getLocale();
            $reasonArr = [];
            foreach ($_SESSION['settings']['return_reasons'] as $reason){
                $reasonArr[] = $reason->$lang ?? $reason->en;
            }
            $_SESSION['reasons'] = $reasonArr;

            echo view('navbar', ['logo' => $_SESSION['settings']['return_settings_logo'], 'background' => $_SESSION['settings']['return_settings_background']]);
            echo view('Retourform/product.php',['items' => $_SESSION['items'], 'color' => $_SESSION['settings']['return_settings_color'], 'reasons' => $_SESSION['reasons'], 'other' => $_SESSION['settings']['return_other_status']]);
        }
        elseif(isset($_POST['deny']))
        {
            echo view('navbar');
            echo view('Retourform/validation');
        }

    }

    public function done(){
        if(!isset($_SESSION['shop_id'])){
            echo view('navbar');
            echo view('Retourform/validation');
            return;
        }

        $lang = $_SESSION['lang'] ?? $this->request->getLocale();

        $tmp = array_filter($this->request->getPost('amount'));

        if(empty($tmp) || !isset($_SESSION['shop_id'])){
            echo view('navbar', ['logo' => $_SESSION['settings']['return_settings_logo'], 'background' => $_SESSION['settings']['return_settings_background']]);
            echo view('Retourform/product.php',['items' => $_SESSION['items'], 'color' => $_SESSION['settings']['return_settings_color'], 'reasons' => $_SESSION['reasons'], 'error' => 'empty']);
        }else{
            $_SESSION['sku'] = $this->request->getPost('product');
            $_SESSION['amount'] = $this->request->getPost('amount');
            $_SESSION['other'] = $this->request->getPost('description');

            if(isset($_POST['reason'])){
                $_SESSION['reason'] = $this->request->getPost('reason');
                for($i = 0; $i < count($_SESSION['reason']); $i++){
                    if($_SESSION['reason'][$i] == 'other'){
                        $_SESSION['reason'][$i] =  $_SESSION['other'][$i];
                    }
                }
            }



            $items = array();
            for ($i = 0; $i < count($_SESSION['sku']); $i++){
                $data = [
                    'sku' => $_SESSION['sku'][$i],
                    'amount' => (int)$_SESSION['amount'][$i],
                    'reason' => (!empty($_SESSION['reason'][$i])) ? $_SESSION['reason'][$i] : '',
                ];

                $items[] = $data;
            }

            $count = count($items);
            for ($i = 0; $i < $count; $i++){
                if($items[$i]['amount'] == 0){
                    unset($items[$i]);
                }
            }

            if(empty($items)){
                echo view('navbar', ['logo' => $_SESSION['settings']['return_settings_logo'], 'background' => $_SESSION['settings']['return_settings_background']]);
                echo view('Retourform/product',['items' => $_SESSION['items'], 'color' => $_SESSION['settings']['return_settings_color']] ,['error' => 'noItem']);
            }else{
                $retour = [
                    'shop_id' => $_SESSION['shop_id'],
                    'order_id' => (int)$_SESSION['order_id'],
                    'items' => $items,
                ];

                $response = $this->ReturnModel->setApi($retour, 'createRetourAnnouncement', false);

                if($response){
                    $this->email($_SESSION['email'],'Return Portal' ,view('template/email', ['items' => $items, 'products' => $_SESSION['items']]));

                    $clear = ['settings'];

                    clearSessions($clear);

                    echo view('navbar', ['logo' => $_SESSION['settings']['return_settings_logo'], 'background' => $_SESSION['settings']['return_settings_background']]);
                    echo view('Retourform/done.php', ['color' => $_SESSION['settings']['return_settings_color'], 'text' => $_SESSION['settings']['return_confirmation_text_'.$lang]]);
                }else{
                    echo view('navbar', ['logo' => $_SESSION['settings']['return_settings_logo'], 'background' => $_SESSION['settings']['return_settings_background']]);
                    echo view('Retourform/unsuccessful.php', ['color' => $_SESSION['settings']['return_settings_color']]);
                }
            }
        }
    }
}
