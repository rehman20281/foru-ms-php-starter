<?php

namespace App\Service;

use Illuminate\Http\Request;

class ThreadService
{
    public function __construct(protected HttpRequestService $http)
    {
    }

    public function createNewThread(Request $request)
    {
        $user = $this->http->getLoginUser();
        if ($user->status() !== 200) {
            return $user->status();
        }

        $data = [
            "title" => $request->get('title'),
            "slug" => $request->get('title'),
            "body" => $request->get('body'),
            "userId" => $user['id'],
//            "locked" => true,
//            "pinned" => true,
//            "tags" => [
//            ],
//            "poll" => [
//                "title" => "string",
//                "options" => [
//                    []
//                ]
//            ]
        ];
        $thread = $this->http->postData(config('api.create_thread'), $data);

        if ($thread->status() == 201) {
            return 201;
        }
    }

    public function getThreads()
    {
        $response = $this->http->getDataByGetMehtod(config('api.threads'));
        $threadCollection = json_decode($response->body());

        foreach ($threadCollection?->threads ?? [] as &$thread) {
            $thread->posts = $this->getPostsByThreadId($thread->id);
        }

        return $threadCollection->threads ?? [];
    }

    private function getPostsByThreadId(string $threadId)
    {
        $response = $this->http->getDataByGetMehtod(
            sprintf(
                config('api.thread_posts'),
                $threadId
            )
        );

        $posts = json_decode($response->body());
        return $posts->posts ?? [];
    }

    public function getThreadById(string $id)
    {
        $response = $this->http->getDataByGetMehtod(config('api.thread_by_id') . $id);
        $thread = json_decode($response->body());
        $thread->posts = $this->getPostsByThreadId($thread->id);
        $thread->user = $this->getUserById($thread->userId);

        return $thread;
    }

    public function getUserById(string $userId)
    {
        $response = $this->http->getDataByGetMehtod(config('api.user_by_id') . $userId);
        $user = json_decode($response->body());
        return $user ?? null;
    }
}
