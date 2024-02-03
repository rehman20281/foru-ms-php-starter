@extends('layouts.master')
@section('content')
    <div class="w-full">
        <div class="w-full px-6">
            <div class="lg:flex flex-wrap">
                <div class="py-10 lg:w-2/3 w-full md:pr-6 sm:border-r border-gray-300">
                    <a href="/">
                        <div class="flex items-center">
                            <div
                                class="mr-3 w-6 h-6 rounded-full text-gray-500 border border-gray-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="icon icon-tabler icon-tabler-chevron-left" width="18" height="18"
                                     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <polyline points="15 6 9 12 15 18"></polyline>
                                </svg>
                            </div>
                            <h4 class="text-xl text-gray-900">Forum Thread</h4>
                        </div>
                    </a>
                    <h1 class="my-6 text-4xl font-medium text-gray-900">
                        {{ $thread->title }}
                    </h1>
                    <div class="md:flex items-center">
                        <div class="w-10 h-10 rounded-full">
                            <img class="w-full h-full object-cover object-center"
                                 src="{{asset('assets/images/enrolled-student-8.png')}}" alt="">
                        </div>
                        <div class="ml-2 md:mt-0 mt-4 flex items-center text-gray-600">
                            <p class="text-gray-600 text-xs">
                                by <span class="text-blue-500">{{ $thread?->user?->displayName }}</span>
                            </p>
                            <div class="w-1 h-1 bg-gray-500 rounded-full mx-2"></div>
                            <p class="text-gray-600 text-xs">{{ \Carbon\Carbon::parse($thread->createdAt)->diffForHumans() }}</p>
                            <div class="w-1 h-1 bg-gray-500 rounded-full mx-2"></div>
                            <p class="ml-2 text-gray-600 text-xs">
                                In: <span class="text-blue-500">Marketing</span>
                            </p>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600 text-sm">
                        {{ $thread->body }}
                    </p>
                    <div class="mt-8 flex items-start">
                        <div class="w-10 h-10 rounded-full flex-shrink-0">
                            <img class="w-full h-full object-cover object-center"
                                 src="{{asset('assets/images/enrolled-student-8.png')}}" alt="">
                        </div>
                        <form action="{{route('create.post')}}" method="post" style="display: block;width: 100%;">
                            @csrf
                            <input type="hidden" name="threadId" value="{{$thread->id}}">
                            <textarea name="comment" placeholder="Reply to {{ $thread?->user?->displayName }}'s post"
                                  class="ml-2 pl-6 pt-2 bg-gray-100 w-full h-24 resize-none focus:outline-none focus:border-blue-400 border border-transparent text-gray-800"></textarea>
                        </form>
                    </div>
                    <div class="my-8 text-gray-900 text-xl">Comments</div>
                    @foreach($thread?->posts as $post)
                        <div>
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full flex-shrink-0">
                                    <img class="w-full h-full object-cover object-center"
                                         src="{{asset('assets/images/enrolled-student-8.png')}}" alt="">
                                </div>
                                <div class="ml-2 w-full">
                                    <div class="flex items-center justify-between w-full">
                                        <h5 class="text-gray-800 text-sm">{{ $post?->user?->displayName }}</h5>
                                        <p class="text-xs text-gray-600">{{ \Carbon\Carbon::parse($post->createdAt)->diffForHumans() }}</p>
                                    </div>
                                    <p class="text-xs text-gray-600">Manager</p>
                                </div>
                            </div>
                            <p class="mt-3 text-gray-600 text-sm">
                                {{ $post?->body }}
                            </p>
                            <div class="mt-3 flex items-center text-gray-600">
                                <a class="text-gray-600 text-xs cursor-pointer">Like</a>
                                <div class="w-1 h-1 bg-gray-500 rounded-full mx-2"></div>
                                <a class="text-gray-600 text-xs cursor-pointer">Reply</a>
                                <div class="w-1 h-1 bg-gray-500 rounded-full mx-2"></div>
                                <p class="ml-2 text-indigo-500 text-xs cursor-pointer">
                                    View replies
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <hr class="mt-6 mb-8 border-t border-gray-300">

                </div>
                @include('includes.recent')
            </div>
        </div>
    </div>
@stop
