<?php

namespace App\Http\Controllers;

use App\Service\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function __construct(protected PostService $service)
    {
    }


    public function create(Request $request)
    {
        $request->validate([
            "comment" => 'required',
            "threadId" => 'required',
        ]);

        $response = $this->service->createNewPost($request);

        if ($response->status() == 201) {
            session()->flash('msg', 'Your comment sent!');
            return redirect()->back();
        }

        return $response->status();
    }

}
