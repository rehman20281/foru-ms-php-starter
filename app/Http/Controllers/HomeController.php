<?php

namespace App\Http\Controllers;

use App\Service\ThreadService;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index(ThreadService $service)
    {
        $threads = $service->getThreads();
        return view('index', compact('threads'));
    }
}
