<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login/Register</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet"/>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;500;700;900&display=swap" rel="stylesheet"/>
</head>

<body>
<div class="flex flex-no-wrap">
    <div class="min-h-screen border-r border-gray-100 sticky top-0 h-full bg-gray-100 z-20">
        <div class="relative top-0 min-h-screen bottom-0 flex items-center flex-col p-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2 cursor-pointer mt-4"
                 width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#718096" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" onclick="sidebarHandler()">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <line x1="4" y1="6" x2="20" y2="6"/>
                <line x1="4" y1="12" x2="20" y2="12"/>
                <line x1="4" y1="18" x2="20" y2="18"/>
            </svg>
            <ul aria-orientation="vertical" class="rounded py-8">
                <li
                    class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-1 hover:text-blue-700 focus:text-blue-700 focus:outline-none">
                    <a href="{{url('/')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="20"
                             height="20"
                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                            <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                            <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                            <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                        </svg>
                    </a>
                </li>
                <li
                    class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal mt-6 py-1 hover:text-blue-700 focus:text-blue-700 focus:outline-none flex items-center">
                    <a href="{{route('login')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="20"
                             height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <div
            class="absolute top-0 min-h-screen ml-10 flex items-start flex-col bg-gray-100 transition duration-150 ease-in-out hidden"
            id="mobile-nav">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="opacity-0 pointer-events-none icon icon-tabler icon-tabler-menu-2 cursor-pointer mt-8"
                 width="20"
                 height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#718096" fill="none" stroke-linecap="round"
                 stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <line x1="4" y1="6" x2="20" y2="6"/>
                <line x1="4" y1="12" x2="20" y2="12"/>
                <line x1="4" y1="18" x2="20" y2="18"/>
            </svg>
            <ul aria-orientation="vertical" class="rounded py-8 pl-2 pr-32 whitespace-no-wrap">
                <li
                    class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-2 hover:text-blue-700 focus:text-blue-700 focus:outline-none">
                    <a href="{{url('/')}}" class="ml-2">Home</a>
                </li>
                <li
                    class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal mt-6 py-2 hover:text-blue-700 focus:text-blue-700 focus:outline-none flex items-center">
                    <a href="{{route('login')}}" class="ml-2">Login/Register</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="flex flex-row w-full">
        <div class="flex flex-col lg:w-full items-center justify-center mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Login
                    </h1>

                    @if($errors->count() > 0 &&  $errors->hasBag('login'))
                        <div
                            class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            @foreach ($errors->all() as $error)
                                <span class="font-medium">{{ $error }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    @if(session('login-error'))
                        <div
                            class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <span class="font-medium">{{ session('login-error') }}
                                </span>
                        </div>
                    @endif
                    <form class="space-y-4 md:space-y-6" action="{{route('user-login')}}" method="post">
                        @csrf
                        <div>
                            <label for="login-email"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username/Email</label>
                            <input type="email" name="email" id="login-email"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="username/name@company.com" required="">
                        </div>
                        <div>
                            <label for="login-password"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="login-password" placeholder="••••••••"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required="">
                        </div>
                        <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>


        <div class="flex flex-col lg:w-full items-center justify-center mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create an account
                    </h1>
                    @if(session()->has('success'))
                        <div
                            class="p-4 mb-4 text-sm text-black-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <span class="font-medium">{{session('msg')}}</span>
                        </div>
                    @endif


                    @if($errors->count() > 0 &&  $errors->hasBag('default'))
                        <div
                            class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            @foreach ($errors->all() as $error)
                                <span class="font-medium">{{ $error }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                    <form class="space-y-4 md:space-y-6" method="post" action="{{route('user-signup')}}">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="email" name="username" id="email"
                                   value="{{old('username')}}"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="my_username" required="">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email"
                                   value="{{old('email')}}"
                                   name="email" id="email"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required="">
                        </div>
                        <div>
                            <label for="confirm-password"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                password</label>
                            <input type="confirm-password" name="confirm-password" id="confirm-password"
                                   placeholder="••••••••"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   required="">
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox"
                                       class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                       required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a
                                        class="font-medium text-blue-600 hover:underline dark:text-blue-500" href="#">Terms
                                        and Conditions</a></label>
                            </div>
                        </div>
                        <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Create an account
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<script src="./assets/scripts/script.js"></script>
</body>

</html>
