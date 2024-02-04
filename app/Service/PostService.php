<?php

namespace App\Service;

use Illuminate\Http\Request;

class PostService
{
    public function __construct(protected HttpRequestService $http)
    {
    }

    public function createNewPost(Request $request)
    {
        $user = $this->http->getLoginUser();

        if ($user->status() !== 200) {
            return $user->status();
        }

        $data = [
            "body" => $request->get('comment'),
            "userId" => $user['id'],
            "threadId" => $request->get('threadId'),
        ];

        return $this->http->postData(config('api.create_post'), $data);
    }

    public function getPosts()
    {
        $response = $this->http->getDataByGetMehtod(config('api.posts'));
        $posts = json_decode($response->body());

        return $posts->posts ?? [];
    }

}
