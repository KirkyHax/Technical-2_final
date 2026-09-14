<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserAccounts extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();

        // Model methods are backed by CodeIgniter's Query Builder.
        $users = $userModel
            ->select('id, username, full_name, created_at')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('users/index', [
            'title'      => 'User Accounts',
            'activePage' => 'users',
            'users'      => $users,
        ]);
    }
}
