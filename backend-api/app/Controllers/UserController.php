<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    public function login()
{
    $model = new \App\Models\UserModel();

    $data = $this->request->getJSON();

    $username = $data->username;
    $password = $data->password;

    $user = $model
        ->where('username', $username)
        ->first();

    if (!$user) {

        return $this->respond([
            'status' => 401,
            'messages' => 'Username tidak ditemukan'
        ], 401);

    }

    if ($user['password'] != md5($password)) {

        return $this->respond([
            'status' => 401,
            'messages' => 'Password salah'
        ], 401);

    }

    return $this->respond([
        'status' => 200,
        'messages' => 'Login berhasil',
        'data' => [
            'token' => md5($username . time())
        ]
    ]);
}
}