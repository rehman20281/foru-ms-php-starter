@extends('layouts.master')

@section('content')
    <div class="w-full">
        <div class="w-full px-6">
            <div class="lg:flex flex-wrap">
                <div class="py-10 lg:w-2/3 w-full sm:pr-6 sm:border-r border-gray-300">
                    <a href="{{url('/')}}">
                        <div class="flex items-center mb-6">
                            <div
                                class="mr-3 w-6 h-6 rounded-full text-gray-500 border border-gray-500 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="18"
                                     height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <polyline points="15 6 9 12 15 18" />
                                </svg>
                            </div>
                            <h4 class="text-xl text-gray-900">User Details</h4>
                        </div>
                    </a>

                    <div class="relative">
                        <img class="h-56 shadow w-full object-cover object-center"
                             src="https://tuk-cdn.s3.amazonaws.com/assets/components/grid_cards/gc_29.png" alt="" />
                        <div
                            class="inset-0 m-auto w-24 h-24 absolute bottom-0 -mb-12 xl:ml-10 rounded-full border-2 shadow border-white">
                            <img class="w-full h-full overflow-hidden object-cover rounded-full"
                                 src="{{$user['image']}}"
                                 alt="" />
                        </div>
                    </div>

                    <div class="pt-3 xl:pt-5 flex flex-col xl:flex-row items-start xl:items-center justify-between">
                        <div class="xl:pr-6 w-full xl:w-2/3">
                            <div
                                class="text-center xl:text-left mb-3 xl:mb-0 flex flex-col xl:flex-row items-center justify-between xl:justify-start">
                                <h2 class="mb-3 xl:mb-0 xl:mr-4 text-2xl text-gray-800 font-medium tracking-normal">
                                    {{$user['displayName'] ?? $user['username']}}
                                </h2>
                                <div class="text-sm bg-blue-500 text-white px-5 py-1 font-normal rounded-full">
                                    {{$user['signature']}}
                                </div>
                            </div>
                            <p class="text-center xl:text-left mt-2 text-sm tracking-normal text-gray-600 leading-5">
                                {{$user['bio']}}
                            </p>
                        </div>
                        <div class="w-full xl:w-1/3 flex-col md:flex-row justify-center xl:justify-end flex xl:pl-6">
                            <div class="flex items-center justify-center xl:justify-start mt-1 md:mt-0 mb-5 md:mb-0">
                                <div
                                    class="ml-5 rounded-full bg-green-200 text-green-500 text-sm px-6 py-2 flex justify-center items-center">
                                    Available
                                </div>
                            </div>
                            <button
                                class="focus:outline-none ml-0 md:ml-5 bg-white transition duration-150 ease-in-out hover:bg-gray-100 rounded text-gray-800 px-3 md:px-6 py-2 text-sm border border-gray-800">
                                Follow
                            </button>
                        </div>
                    </div>
                    <div class="mt-3 sm:flex items-center">
                        <p class="py-1 px-2 text-xs text-gray-600 bg-gray-100 sm:mr-3 sm:mt-0 mt-1">
                            Investments
                        </p>
                        <p class="py-1 px-2 text-xs text-gray-600 bg-gray-100 sm:mr-3 sm:mt-0 mt-1">
                            Financial Modeling
                        </p>
                        <p class="py-1 px-2 text-xs text-gray-600 bg-gray-100 sm:mr-3 sm:mt-0 mt-1">
                            Budget
                        </p>
                        <p class="py-1 px-2 text-xs text-gray-600 bg-gray-100 sm:mr-3 sm:mt-0 mt-1">
                            Business Strategy
                        </p>
                        <p class="py-1 px-2 text-xs text-gray-600 bg-gray-100 sm:mt-0 mt-1">
                            Audit & Assurance
                        </p>
                    </div>

                    <hr class="mt-4 mb-10 border-t border-gray-300" />

                    <h3 class="text-xl text-gray-900 mb-6">
                        Recent posts by You
                    </h3>
                    <div class="mb-6 bg-white w-full border-r-4 border-blue-500 px-4 pt-5 pb-8 shadow-md">
                        @if(count($posts) == 0)
                            No post
                        @endif
                        @foreach($posts ?? [] as $post)
                        <div class="mb-3 sm:flex items-center justify-between">
                            <div class="pr-6 w-full md:w-3/5">
                                <h4 class="text-gray-800 font-medium mb-2">
                                    {{ $post->body }}
                                </h4>

                            </div>
                            <div class="w-full md:w-2/5 sm:mt-0 mt-4">
                                <ul class="flex items-center">
                                    <li class="text-gray-600 flex items-center text-xs mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 icon icon-tabler icon-tabler-clock"
                                             width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="12" cy="12" r="9" />
                                            <polyline points="12 7 12 12 15 15" />
                                        </svg>
                                        <span class="mx-2">|</span>
                                        <p>{{ \Carbon\Carbon::parse($post->createdAt)->diffForHumans() }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr class="mt-4 mb-10 border-t border-gray-300" />

                        @endforeach
                    </div>
                </div>
{{--                <div class="py-10 lg:w-1/3 w-full md:pl-6">--}}
{{--                    <div class="flex items-center justify-between mb-6">--}}
{{--                        <h4 class="text-gray-900 text-xl font-medium">Statistics</h4>--}}
{{--                        <a class="text-blue-500 text-sm font-bold cursor-pointer">View All</a>--}}
{{--                    </div>--}}
{{--                    <div class="mb-6 flex items-center">--}}
{{--                        <div>--}}
{{--                            <h5 class="mb-3 text-green-500 font-light text-3xl">92%</h5>--}}
{{--                            <p class="text-gray-900">Success Rate</p>--}}
{{--                        </div>--}}
{{--                        <div class="md:ml-16 lg:ml-64 ml-8">--}}
{{--                            <h5 class="mb-3 text-green-500 font-light text-3xl">16</h5>--}}
{{--                            <p class="text-gray-900">Courses Taught</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <hr class="my-8 border-t border-gray-300" />--}}
{{--                    <div class="flex items-center justify-between mb-6">--}}
{{--                        <h4 class="text-gray-900 text-xl font-medium">Education</h4>--}}
{{--                        <a class="text-blue-500 text-sm font-bold cursor-pointer">View All</a>--}}
{{--                    </div>--}}
{{--                    <div class="mb-6 flex items-center">--}}
{{--                        <img src="./assets/images/uni.png" />--}}
{{--                        <div class="ml-5">--}}
{{--                            <h5 class="mb-2 text-gray-800">HND Marketing</h5>--}}
{{--                            <p class="text-gray-600">Bethel University</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="mb-6 flex items-center">--}}
{{--                        <img src="./assets/images/uni.png" />--}}
{{--                        <div class="ml-5">--}}
{{--                            <h5 class="mb-2 text-gray-800">HND Marketing</h5>--}}
{{--                            <p class="text-gray-600">Bethel University</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="mb-6 flex items-center">--}}
{{--                        <img src="./assets/images/uni.png" />--}}
{{--                        <div class="ml-5">--}}
{{--                            <h5 class="mb-2 text-gray-800">HND Marketing</h5>--}}
{{--                            <p class="text-gray-600">Bethel University</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="pt-16">--}}
{{--                        <h4 class="mb-5 font-medium text-xl text-gray-900">--}}
{{--                            What I do--}}
{{--                        </h4>--}}
{{--                        <p class="text-sm text-gray-600">--}}
{{--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed--}}
{{--                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.--}}
{{--                            Et quidem faciunt, ut de voluptate ponit, quod summum bonum--}}
{{--                            sit aut rerum et quidem--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <div class="pt-16">--}}
{{--                        <h4 class="mb-5 font-medium text-xl text-gray-900">--}}
{{--                            Achievements--}}
{{--                        </h4>--}}
{{--                        <p class="text-sm text-gray-600 mb-4">--}}
{{--                            5 years Marketing and Advertising at a Fortune 50 Industrial--}}
{{--                            company.--}}
{{--                        </p>--}}
{{--                        <p class="text-sm text-gray-600 mb-4">--}}
{{--                            5 years Marketing and Advertising at a Fortune 50 Industrial--}}
{{--                            company.--}}
{{--                        </p>--}}
{{--                        <p class="text-sm text-gray-600 mb-4">--}}
{{--                            5 years Marketing and Advertising at a Fortune 50 Industrial--}}
{{--                            company.--}}
{{--                        </p>--}}
{{--                        <p class="text-sm text-gray-600 mb-4">--}}
{{--                            5 years Marketing and Advertising at a Fortune 50 Industrial--}}
{{--                            company.--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@stop
