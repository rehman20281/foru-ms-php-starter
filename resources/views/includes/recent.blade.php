<div class="py-10 lg:w-1/3 w-full md:pl-6">
    <h3 class="mb-10 text-gray-900 font-medium text-xl">
        Recent threads
    </h3>
    @foreach($threads as $thread)
    <div class="flex items-center mb-6">
        <div class="w-10 h-10 rounded-full">
            <img class="w-full h-full object-cover object-center flex-shrink-0 flex"
                 src="{{asset('assets/images/enrolled-student-8.png')}}" alt=""/>
        </div>
        <p class="text-gray-900 text-sm ml-4">{{$thread?->user?->displayName}}</p>
        <div class="w-1 h-1 bg-gray-500 rounded-full mx-3"></div>

        <p class="text-gray-600 text-xs">58 solutions</p>
        <div class="w-1 h-1 bg-gray-500 rounded-full mx-3"></div>

        <p class="text-gray-600 text-xs">220 appreciations</p>
    </div>
    @endforeach
    <hr class="border-t border-gray-300 my-8"/>
    <h3 class="mb-6 text-gray-900 font-medium text-xl">
        Recent posts
    </h3>

    @foreach($posts as $post)
        <div class="mb-6">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full flex-shrink-0">
                    <img class="w-full h-full object-cover object-center flex-shrink-0"
                         src="{{asset('assets/images/enrolled-student-8.png')}}" alt=""/>
                </div>
                <div class="ml-2 w-full">
                    <h5 class="text-gray-800 text-sm">{{ $post?->user?->displayName }}</h5>
                    <div class="md:flex items-center justify-between w-full">
                        <p class="text-xs text-gray-600">Manager</p>
                        <p class="text-xs text-blue-500">
                            In: Introduction to Consumer Behavior
                        </p>
                    </div>
                </div>
            </div>
            <p class="mt-3 text-gray-600 text-sm">
                {{ $post->body }}
            </p>
            <div class="mt-3 flex items-center text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message"
                     width="24"
                     height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"/>
                    <line x1="8" y1="9" x2="16" y2="9"/>
                    <line x1="8" y1="13" x2="14" y2="13"/>
                </svg>
                <p class="ml-2 text-gray-600 text-xs">20 comments</p>
            </div>
        </div>
    @endforeach

</div>
