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
        try {
            $response = $this->http->getLoginUser(config('api.get_user'));

            if (!$response->ok()) {
                return response()->json(['user' => $response->status()]);
            }

            $user = $response->collect();
            return view("user", compact("user"));
        } catch (\Exception $e) {

        }
    }
}
