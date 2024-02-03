<?php

namespace App\Http\Controllers;

use App\Service\PostService;
use App\Service\ThreadService;
use Illuminate\Http\Request;

class ThreadController extends Controller
{

    public function __construct(
        protected ThreadService $service,
        protected PostService   $postService
    ) {
    }

    public function index()
    {
        return view("new-thread");
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $result = $this->service->createNewThread($request);

        if (in_array($result, [200, 201])) {
            session()->flash('msg', 'Thread successfully created!');
            return redirect()->back();
        }

        session()->flash('msg', 'Something went wrong');
        return redirect()->back();
    }

    public function getThreadDetail(string $id)
    {
        try {
            $posts = $this->postService->getPosts();
            $thread = $this->service->getThreadById($id);
            $threads = $this->service->getThreads();

            return view('thread_details', compact('thread', 'posts', 'threads'));
        } catch (\Throwable $e) {

        }
    }

    public function getThreads()
    {
        try {
            $threads = $this->service->getThreads();
            $posts = $this->postService->getPosts();
            return view('index', compact('threads', 'posts'));
        } catch (\Throwable $e) {

        }
    }
}
