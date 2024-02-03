<?php

namespace App\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function __construct(protected HttpRequestService $http)
    {
    }

    public function handleSignup(Request $request)
    {
        $data = [
            "username" => $request->get('username'),
            "email" => $request->get('email'),
            "displayName" => $request->get('username'),
            "password" => $request->get('password'),
            "emailVerified" => true,
            "roles" => [
            ],
            "extendedData" => []
        ];

        $response = $this->http->postData(config('api.user_signup',), $data);
        if ($response->created()) {
            return $this->handleLogin($request);
        }

        return redirect('/login');
    }


    public function handleLogin(Request $request)
    {
        $response = $this->http->postData(config('api.user_login',), [
            "login" => $request->get('email'),
            "password" => $request->get('password'),
        ]);

        if (!$response->ok()) {
           return redirect()->back()->with('login-error', 'Incorrect email and password');
        }

//        dd(json_decode($response->body()));
        session()->put('token', $response->collect()['token']);
        session()->put('login', true);
        return redirect('user');
    }
}
