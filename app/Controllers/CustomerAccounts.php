<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class CustomerAccounts extends BaseController
{
    public function index(): string
    {
        $customerModel = new CustomerModel();

        // Model methods are backed by CodeIgniter's Query Builder.
        $customers = $customerModel
            ->select('id, full_name, email, phone, created_at')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('customers/index', [
            'title'      => 'Customer Accounts',
            'activePage' => 'customers',
            'customers'  => $customers,
        ]);
    }
}
