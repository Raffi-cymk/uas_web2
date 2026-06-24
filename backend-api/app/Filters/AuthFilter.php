<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Izinkan preflight CORS
        if ($request->getMethod() === 'OPTIONS') {
            return service('response');
        }

        $header = $request->getHeaderLine('Authorization');

        if (empty($header)) {
            return service('response')
                ->setStatusCode(401)
                ->setJSON([
                    'status' => 401,
                    'message' => 'Unauthorized'
                ]);
        }

        // Pastikan format Bearer
        if (!preg_match('/Bearer\s(\S+)/', $header, $matches)) {
            return service('response')
                ->setStatusCode(401)
                ->setJSON([
                    'status' => 401,
                    'message' => 'Invalid Token'
                ]);
        }

        $token = $matches[1];

        if (empty($token)) {
            return service('response')
                ->setStatusCode(401)
                ->setJSON([
                    'status' => 401,
                    'message' => 'Invalid Token'
                ]);
        }

        // Jika ingin validasi JWT/database, lakukan di sini.
        // Untuk kebutuhan UAS cukup memastikan Bearer Token ada.
        return;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept, Authorization');
        $response->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}