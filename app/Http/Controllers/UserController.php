<?php

namespace App\Http\Controllers;

use App\Service\HttpRequestService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(protected HttpRequestService $http)
    {
    }

    public function index()
    {
        $response = $this->http->getLoginUser(config('api.get_user'));

        if (!$response->ok()) {
            return redirect('login');
        }
        $user = $response->collect();

        return view("user", compact("user"));
    }
}
