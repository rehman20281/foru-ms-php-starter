<?php

namespace App\Http\Controllers;

use App\Service\HttpRequestService;
use App\Service\PostService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(protected HttpRequestService $http)
    {
    }

    public function index(PostService $service)
    {
        try {
            $response = $this->http->getLoginUser(config('api.get_user'));

            if (!$response->ok()) {
                return response()->json(['user' => $response->status()]);
            }

            $user = $response->collect();
//            $userId = "46ff5bcb-5c76-42d4-b4fe-6488251bb2f5";
//            $posts = $service->getPostsByUserId($userId);
            $posts = $service->getPostsByUserId($response['id']);

//            $posts = [];
//            foreach ($postCollection ?? [] as $post) {
//                $posts[$post->Thread->title][] = $post;
//            }

            return view("user", compact("user", 'posts'));
        } catch (\Exception $e) {

        }
    }

}
