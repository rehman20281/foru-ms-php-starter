<?php

namespace App\Http\Controllers;

use App\Service\AuthService;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    use ValidatesRequests;

    public function __construct(protected  AuthService $authService)
    {
    }

    public function index()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $this->validateWithBag('login', $request, [
            'password' => 'required',
            'email' => 'required|email',
        ]);

        return $this->authService->handleLogin($request);
    }

    public function signup(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'min:8|required_with:confirm-password|same:confirm-password',
            'confirm-password' => 'min:8'
        ]);

        $this->authService->handleSignup($request);
        return view('login');
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
