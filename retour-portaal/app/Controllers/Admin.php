<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Customer;
use App\Models\ReturnModel;

class Admin extends BaseController
{
    public function index()
    {
        echo view('Admin/partials/navbar.php');
        echo view('Admin/dashboard.php');
    }

    public function returns(){
        $returns_model = new ReturnModel();
        $returns = $returns_model->findAll();

        $customer_model = new Customer();
        $customers = $customer_model->findAll();

        $data = array('returns'=>$returns, 'customers' =>$customers);

        echo view('Admin/partials/navbar.php');
        echo view('Admin/returns', $data);
    }
}
