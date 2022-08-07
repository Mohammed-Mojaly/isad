<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https//unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <script type="text/javascript" src="/sweetalert2.min.js"></script>

    @yield('style')
    <style>
        @media screen and (max-width: 992px) {
            .droowr {
                display: none;
            }
        }
    </style>

</head>


<body>



    <nav class="bg-gray-200 border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
        <div class="container flex flex-wrap justify-between items-center mx-auto">

            <div class="flex w-full items-center md:order-2">
                <button type="button"
                    class="relative lg:left-[90%] left-[85%] flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom" style="left: 85%">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="/storage/{{ auth()->user()->profile_photo_path }}"
                        alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 hidden"
                    id="user-dropdown" data-popper-reference-hidden="" data-popper-escaped=""
                    data-popper-placement="bottom"
                    style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(585px, 82px);">
                    <div class="py-3 px-4">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                        <span
                            class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                    </div>
                    <ul class="py-1" aria-labelledby="user-menu-button">

                        <li>
                            <a href="{{ route('profile.show') }}"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button type="submit"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <button type="button"
                    class="absolute inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg  hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    onclick="myFunction()">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mneu-m">

            </div>
        </div>
    </nav>


    <!-- drawer component -->
    <div class="fixed w-80 lg:w-[20%]  z-40 h-screen p-4 overflow-y-auto bg-gray-200  dark:bg-gray-800 transition-transform left-0 top-0 transform-none droowr"
        id="droowrrr" tabindex="-1" aria-labelledby="drawer-navigation-label" aria-modal="true" role="dialog" >
        <a href="/" id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">ISAD
        </a>
        <button type="button" onclick="myFunction()" data-drawer-dismiss="drawer-navigation" aria-controls="drawer-navigation"
            class="text-gray-400 bg-transparent lg:hidden hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div class="py-4 overflow-y-auto">
            <ul class="space-y-2">

                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <svg aria-hidden="true"
                            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Users</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a href="{{ route('users.index') }}"
                                class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Users</a>
                        </li>
                        <li>
                            <a href="{{ route('users.create') }}"
                                class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Add
                                User</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example2" data-collapse-toggle="dropdown-example2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                            style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                            viewBox="0 0 1024 1024" version="1.1">
                            <path
                                d="M776.68864 226.46784c-24.54528-141.58336-158.12096-236.032-298.28608-211.13344-139.9808 24.90368-258.26304 133.93408-233.53856 275.33824 5.33504 30.592 20.096 78.26432 37.5296 112.59392L28.04224 770.20672c-9.42592 13.5168-14.76608 37.888-11.91936 54.25152l11.02848 62.78656c-10.496-60.47232 2.84672 21.87776 11.02336 21.51936l83.77344 1.24416c16.18944-2.8416 36.46464-16.54272 45.35808-30.4128l100.67456-157.4144 0.88576-1.07008 87.86944 6.9376 117.57056-184.27392s26.16832-53.53984 123.07456-105.05728c88.69376-41.06752 163.04128-32.49152 163.04128-32.49152 21.57056-53.99552 27.20256-117.66784 16.26624-179.75808zM96.86528 795.38176l-22.00064 13.8496 5.12512-24.8832 238.70464-341.62688 16.50688 11.56096-238.336 341.09952zM652.71296 298.8544c-38.59456 55.49568-77.90592 16.36864-132.864-22.58944-54.9632-38.95296-104.94464-62.78144-66.34496-118.45632 38.59456-55.49056 114.36544-69.18656 169.32864-30.23872 54.95808 39.13216 68.47488 115.79392 29.88032 171.28448z"
                                fill="" />
                            <path
                                d="M1013.38112 742.5024c0 148.32128-120.23808 268.55424-268.55424 268.55424s-268.55424-120.23808-268.55424-268.55424 120.23808-268.55424 268.55424-268.55424 268.55424 120.23808 268.55424 268.55424z m-309.00224-136.2432c-0.10752 1.77152 0 96.01024 0 96.01024H606.6688c-43.16672 2.54464-42.37312 40.23296-42.37312 40.23296s0 37.9392 42.37312 40.23296h97.70496v96.01024c3.01056 42.9568 40.23296 42.37312 40.23296 42.37312s38.15424 0 40.23296-42.37312v-96.01024h94.31552c42.37312-2.42176 42.37312-40.23296 42.37312-40.23296s0-37.56032-42.37312-40.23296h-94.3104V606.2592c-2.26816-42.37312-40.23296-42.37312-40.23296-42.37312s-37.71904-0.00512-40.23296 42.37312z"
                                fill="" />
                        </svg> <span class="flex-1 ml-3 text-left whitespace-nowrap">Permissions</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <ul id="dropdown-example2" class="hidden py-2 space-y-2">
                        <li>
                            <a href="{{ route('roles.index') }}"
                                class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Permissions</a>
                        </li>
                        <li>
                            <a href="{{ route('roles.create') }}"
                                class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Add
                                Permission</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <button type="submit"
                            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>




    <style>
        @media screen and (min-width: 993px) {
            #cont {
                left: 50%;
                position: absolute;
                transform: translate(-30%, 0);
            }
        }
    </style>
    <div class="mx-auto  max-w-fit" id="cont">
        @include('admin.message')
        @yield('content')

    </div>


    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <script>
        function myFunction() {
            var element = document.getElementById("droowrrr");
            element.classList.toggle("droowr");
        }
    </script>
    @yield('script')
</body>

</html>
