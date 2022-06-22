<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Email extends BaseController
{
    public function index()
    {
        echo view('template/email');
    }
}
