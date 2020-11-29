<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DOGopedia</title>

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body class="font-sans bg-gray-900 text-white flex flex-col h-screen justify-between">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-2 py-6">
            <a href='{!! url('/'); !!}' class="flex items-center">
                <svg class="w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="#FFF" d="M17.412 6.937c-.36-.283-.924-.4-1.463-.365-.416.026-.761.034-1.005.182-1.116.677-1.217 4.353.182 4.934 2.974 1.236 4.057-3.35 2.286-4.751zm-4.479 3.838c-.963-1.119-1.64-2.681-3.563-2.376-1.706.272-1.924 1.67-2.833 2.65-1.08 1.164-3.105 2.018-3.564 3.838-.335 1.329.116 2.892.913 3.473 1.566 1.137 4.474-.125 6.58.09 1.26.13 2.225.573 3.198.55 2.262-.054 4.09-1.67 3.107-4.295-.48-1.286-2.6-2.494-3.838-3.93zm-.274-3.93c1.134.033 2.302-1.264 2.376-2.467.098-1.57-.93-3.143-2.467-2.741-.914.239-1.664 1.41-1.736 2.56-.083 1.331.617 2.615 1.827 2.649zM8.273 6.48C9.45 6.321 9.94 4.908 9.736 3.282 9.566 1.943 8.84.645 7.268 1.089 5.103 1.7 5.448 6.862 8.273 6.48zM4.16 10.592c2.583-.385 1.98-5.938-.822-5.3-2.41.55-2.087 5.735.822 5.3z"/></svg>                <span class="text-2xl pl-2 tracking-widest">DOGopedia</span>
            </a>
            <div class="relative w-full my-4 px-6 md:w-1/2">
                <input type="text" class="bg-gray-800 rounded-lg w-full h-10 pl-8 pr-4 py-1 focus:outline-none focus:shadow-outline" placeholder="Search by Breed">
                <div class="absolute top-0">
                    <svg class="w-4 fill-current text-gray-500 mt-3 mx-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 111.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 108 2a6 6 0 000 12z"/></svg>
                </div>
            </div>
            <a href='{!! url('/all'); !!}' class="bg-purple-800 hover:bg-purple-700 text-gray-100 hover:text-gray-200 py-2 px-4 rounded">All Breeds</a>
        </div>
    </nav>
    
    <main class="mb-auto">
        @yield('content')
    </main>
    
    <footer class="border border-t border-gray-800 mt-16">
        <div class="container flex flex-col items-center mx-auto text-gray-400 text-sm px-4 py-6">
            <span>2020 © LNKHDL</span>
            <span>Thanks <a href="https://thedogapi.com/" class="underline">TheDogAPI.com</a></span>
        </div>
    </footer>
</body>
</html>